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
}
