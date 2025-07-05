<?php


namespace App\Http\Controllers\Agricultor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PostulacionTransportista;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Transporte;
use Illuminate\Support\Carbon;

class PostulacionTransportistaController extends Controller
{
    public function index()
    {
        // Obtener todas las postulaciones relacionadas a los pedidos de este agricultor
        $postulaciones = PostulacionTransportista::with(['pedido', 'transportista'])
            ->whereHas('pedido', function ($query) {
                $query->where('agricultor_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('agricultor.postulaciones.index', compact('postulaciones'));
    }

   public function responder(Request $request, $id)
    {
        $request->validate([
            'accion' => 'required|in:aceptar,rechazar',
        ]);

        $postulacion = PostulacionTransportista::with('pedido')
            ->where('id', $id)
            ->whereHas('pedido', function ($q) {
                $q->where('agricultor_id', Auth::id());
            })
            ->firstOrFail();

        $postulacion->estado = $request->accion === 'aceptar' ? 'aceptado' : 'rechazado';
        $postulacion->save();

        if ($request->accion === 'aceptar') {
            $pedido = $postulacion->pedido;

            // Cambiar estado del pedido
            $pedido->estado = 'en_transporte';
            $pedido->save();

            // Crear registro en la tabla transportes
            Transporte::create([
                'pedido_id' => $pedido->id,
                'agricultor_id' => $pedido->agricultor_id,
                'transportista_id' => $postulacion->transportista_id,
                'fecha_envio' => Carbon::now(),
                'total_estimado' => $pedido->total_kg * $pedido->precio_transporte_kg,
                'estado' => 'pendiente',
            ]);
        }

        return redirect()->route('agricultor.postulaciones')->with('success', 'Postulación actualizada correctamente.');
    }

    public function revertir($id)
    {
        $postulacion = PostulacionTransportista::with('pedido')
            ->where('id', $id)
            ->where('estado', 'rechazado')
            ->whereHas('pedido', function ($q) {
                $q->where('agricultor_id', Auth::id());
            })->firstOrFail();

        // Verifica si ya hay transporte asignado para este pedido
        $pedido = $postulacion->pedido;
        $yaAsignado = Transporte::where('pedido_id', $pedido->id)->exists();

        if ($yaAsignado) {
            return back()->with('error', 'Ya se ha asignado un transportista a este pedido. No puedes revertir la postulación.');
        }

        // Revertir a estado pendiente
        $postulacion->estado = 'pendiente';
        $postulacion->save();

        return back()->with('success', 'La postulación ha sido revertida. Ahora el transportista puede ser considerado nuevamente.');
    }
}
