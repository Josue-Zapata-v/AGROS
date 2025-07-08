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
        if (Auth::check() && Auth::user()->role !== 'comprador') {
            $rol = Auth::user()->role;

            if ($rol === 'agricultor') {
                return redirect()->route('agricultor.dashboard')->with('error', 'Solo los compradores pueden acceder al catálogo público.');
            } elseif ($rol === 'transportista') {
                return redirect()->route('transportista.dashboard')->with('error', 'Solo los compradores pueden acceder al catálogo público.');
            } else {
                return redirect('/')->with('error', 'Acceso no autorizado.');
            }
        }

        
        $productos = Producto::whereColumn('stock', '>=', 'min_kg_envio')
            ->with('agricultor')
            ->latest()
            ->paginate(12);



        return view('comprador.dashboard', compact('productos'));
    }

    // 🟢 Este método muestra los detalles de un producto específico
    public function show($id)
    {
        $producto = Producto::with(['agricultor', 'categorias'])
            ->whereColumn('stock', '>=', 'min_kg_envio')
            ->findOrFail($id);


        return view('comprador.productos.show', compact('producto'));
    }

}
