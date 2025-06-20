<?php


namespace App\Http\Controllers\Agricultor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PostulacionTransportista;
use App\Models\User;
use App\Models\Pedido;

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
        $postulacion = PostulacionTransportista::where('id', $id)
            ->whereHas('pedido', function ($q) {
                $q->where('agricultor_id', Auth::id());
            })
            ->firstOrFail();
        $postulacion->estado = $request->accion === 'aceptar' ? 'aceptado' : 'rechazado';
        $postulacion->save();

        return redirect()->route('agricultor.postulaciones')->with('success', 'Postulación actualizada.');
    }
}
