<?php

namespace App\Http\Controllers\Agricultor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;


class ProductoController extends Controller
{
    public function index()
    {

        if (!Auth::check() || Auth::user()->role !== 'agricultor') {
            $rol = Auth::user()->role ?? 'invitado';

            if ($rol === 'comprador') {
                return redirect()->route('productos.publicos')->with('error', 'Solo los agricultores pueden acceder a esta sección.');
            } elseif ($rol === 'transportista') {
                return redirect()->route('transportista.dashboard')->with('error', 'Solo los agricultores pueden acceder a esta sección.');
            } else {
                return redirect('/')->with('error', 'Acceso no autorizado.');
            }
        }

        $user = Auth::user();
        // Verificamos si el perfil está incompleto (basado en dirección)
        $perfilIncompleto = empty($user->departamento) ||
                            empty($user->provincia) ||
                            empty($user->distrito) ||
                            empty($user->direccion_detallada);

        // Traer productos del agricultor autenticado
        $productos = Producto::where('agricultor_id', $user->id)->get();

        
        return view('agricultor.dashboard', compact('productos', 'perfilIncompleto'));

        
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('agricultor.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $data = $this->validarProducto($request);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $data['agricultor_id'] = Auth::id();

        $producto= Producto::create($data);
        if ($request->has('categorias')) {
            $producto->categorias()->sync($request->categorias); 
        }
        return redirect()->route('agricultor.dashboard')->with('success', 'Producto creado con éxito.');

        

    }

    public function edit($id)
    {
        $producto = $this->obtenerProducto($id);
        $categorias = Categoria::all();
        return view('agricultor.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = $this->obtenerProducto($id);
        $data = $this->validarProducto($request);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update($data);

        if ($request->has('categorias')) {
            $producto->categorias()->sync($request->categorias);
        }

        return redirect()->route('agricultor.dashboard')->with('success', 'Producto actualizado.');
    }

    public function destroy($id)
    {
        $producto = $this->obtenerProducto($id);

        if ($producto->detallesPedido()->exists()) {
            return redirect()->route('agricultor.dashboard')
                ->with('error', 'No puedes eliminar este producto porque ya ha sido parte de pedidos.');
        }

            // Eliminar relaciones con categorías
            $producto->categorias()->detach();

            // Eliminar el producto
            $producto->delete();

            return redirect()->route('agricultor.dashboard')->with('success', 'Producto eliminado correctamente.');
    }
        

    // Métodos auxiliares
    private function validarProducto(Request $request)
    {
        return $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string', 
            'precio' => 'required|numeric|min:0.10',
            'stock' => 'required|integer|min:50|max:2000',
            'caracteristicas' => 'required|string',
            'min_kg_envio' => 'required|integer|min:50',
            'max_kg_envio' => 'required|integer|gte:min_kg_envio|max:1000',
            'imagen' => 'nullable|image|max:2048'
        ]);
    }

    private function obtenerProducto($id)
    {
        return Producto::where('id', $id)
            ->where('agricultor_id', Auth::id())
            ->firstOrFail();
    }
}
