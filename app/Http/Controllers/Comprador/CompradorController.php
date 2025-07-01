<?php


// app/Http/Controllers/Comprador/CompradorController.php

namespace App\Http\Controllers\Comprador;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CompradorController extends Controller
{
    public function index()
    {
        $productos = Producto::where('stock', '>', 0)
            ->with('agricultor') // si tienes relación
            ->latest()
            ->paginate(12);

        return view('comprador.dashboard', compact('productos'));
    }

    // 🟢 Este método muestra los detalles de un producto específico
    public function show($id)
    {
        $producto = Producto::with(['agricultor', 'categorias'])->findOrFail($id);

        return view('comprador.productos.show', compact('producto'));
    }
}
