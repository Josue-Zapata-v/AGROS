<?php

namespace App\Http\Controllers\Comprador;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'comprador') {
            abort(403, 'No autorizado');
        }
        // Pedidos del comprador autenticado, con productos relacionados
        $pedidos = Pedido::with(['detalles.producto'])
            ->where('comprador_id', Auth::id())
            ->latest()
            ->get();

        return view('comprador.mis_pedidos', compact('pedidos'));
    }
}
