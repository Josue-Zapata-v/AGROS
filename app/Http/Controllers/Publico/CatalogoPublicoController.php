<?php
namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Producto;

class CatalogoPublicoController extends Controller
{
    public function index()
    {
        $productos = Producto::where('stock', '>', 0)->latest()->paginate(12);
        return view('comprador.dashboard', compact('productos'));
    }
}
