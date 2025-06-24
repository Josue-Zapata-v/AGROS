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
        $productos = Producto::where('agricultor_id', auth()->id())->get();
        return view('agricultor.dashboard', compact('productos'));
        
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
        $producto->delete();

        return redirect()->route('agricultor.dashboard')->with('success', 'Producto eliminado.');
    }

    // Métodos auxiliares
    private function validarProducto(Request $request)
    {
        return $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'ubicacion' => 'required|string|max:150',
            'caracteristicas' => 'nullable|string',
            'min_kg_envio' => 'required|integer|min:1',
            'max_kg_envio' => 'required|integer|gte:min_kg_envio',
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
