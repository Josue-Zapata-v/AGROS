<?php
namespace App\Http\Controllers\Agricultor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Http\Request;


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
    public function marcarListoParaEnvio(Request $request, $id)
    {
        $request->validate([
            'precio_transporte_kg' => 'required|numeric|min:0',
        ]);

        $pedido = Pedido::findOrFail($id);

        if ($pedido->estado !== 'pendiente') {
            return back()->with('error', 'Este pedido ya ha sido marcado como listo.');
        }

        $pedido->estado = 'listo_para_envio';
        $pedido->precio_transporte_kg = $request->precio_transporte_kg;
        $pedido->save();

        return back()->with('success', 'Pedido marcado como listo para envío.');
    }

}
