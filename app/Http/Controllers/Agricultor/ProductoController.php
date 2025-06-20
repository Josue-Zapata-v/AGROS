<?php

namespace App\Http\Controllers\Agricultor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::where('agricultor_id', auth()->id())->get();
        return view('agricultor.dashboard', compact('productos'));
    }

    public function create()
    {
        return view('agricultor.productos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validarProducto($request);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $data['agricultor_id'] = Auth::id();

        Producto::create($data);

        return redirect()->route('agricultor.dashboard')->with('success', 'Producto creado con éxito.');
    }

    public function edit($id)
    {
        $producto = $this->obtenerProducto($id);
        return view('agricultor.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = $this->obtenerProducto($id);
        $data = $this->validarProducto($request);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update($data);

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
