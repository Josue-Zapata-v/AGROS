<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function registrar(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'metodo_pago' => 'required|in:tarjeta,transferencia,efectivo',
            'monto' => 'required|numeric|min:0',
        ]);

        $pago = Pago::create([
            'pedido_id' => $request->pedido_id,
            'metodo_pago' => $request->metodo_pago,
            'monto' => $request->monto,
            'fecha_pago' => now(),
        ]);

        return redirect()->back()->with('success', 'Pago registrado correctamente.');
    }
}
