<?php
namespace App\Http\Controllers\Agricultor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\DetallePedido;

class PedidoController extends Controller
{
    public function index()
    {
        $agricultorId = Auth::id();

        $pedidos = Pedido::with(['detalles.producto', 'comprador'])
            ->where('agricultor_id', $agricultorId)
            ->latest()
            ->get();

        return view('agricultor.pedidos.index', compact('pedidos'));
    }

    public function verDetalle($id)
    {
        $pedido = Pedido::with('detalles.producto')
            ->where('comprador_id', auth()->id())
            ->findOrFail($id);

        return view('comprador.pedidos.detalle', compact('pedido'));
}
}
