<?php

namespace App\Http\Controllers\Transportista;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\PostulacionTransportista;
use App\Models\Transporte;



class TransportistaController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check() || Auth::user()->role !== 'transportista') {
            $rol = Auth::user()->role ?? 'invitado';
            if ($rol === 'comprador') {
                return redirect()->route('productos.publicos')->with('error', 'Solo los transportistas pueden acceder a este panel.');
            } elseif ($rol === 'agricultor') {
                return redirect()->route('agricultor.dashboard')->with('error', 'Solo los transportistas pueden acceder a este panel.');
            } else {
                return redirect('/')->with('error', 'Acceso no autorizado.');
            }
        }
        
        $usuario = Auth::user();
        return view('transportista.dashboard', compact('usuario'));
    }
    public function pedidosDisponibles()
    {
        if (!Auth::check() || Auth::user()->role !== 'transportista') {
            $rol = Auth::user()->role ?? 'invitado';
            if ($rol === 'comprador') {
                return redirect()->route('catalogo.publico')->with('error', 'Solo los transportistas pueden acceder a este panel.');
            } elseif ($rol === 'agricultor') {
                return redirect()->route('agricultor.dashboard')->with('error', 'Solo los transportistas pueden acceder a este panel.');
            } else {
                return redirect('/')->with('error', 'Acceso no autorizado.');
            }
        }
        $transportistaId = Auth::id();

        $pedidos = Pedido::with(['agricultor', 'detalles.producto']) // trae detalles y producto
            ->where('estado', 'listo_para_envio') // o el estado que represente "por asignar"
            ->whereDoesntHave('transporte') // sin transporte asignado
            ->whereDoesntHave('postulaciones', function ($query) use ($transportistaId) {
                $query->where('transportista_id', $transportistaId);
            }) 
            ->get();

        return view('transportista.pedidos.index', compact('pedidos'));
    }

    public function postular($pedidoId)
    {
        $transportistaId = Auth::id();

        // Verificar si ya se postuló a ese pedido
        $existe = PostulacionTransportista::where('pedido_id', $pedidoId)
            ->where('transportista_id', $transportistaId)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Ya te postulaste a este pedido.');
        }

        // Crear nueva postulación
        PostulacionTransportista::create([
            'pedido_id' => $pedidoId,
            'transportista_id' => $transportistaId,
            'estado' => 'pendiente',
            'mensaje' => null, // si luego quieres agregar
        ]);

        return back()->with('success', 'Te postulaste correctamente.');
    }

    public function misPostulaciones()
    {
        $transportistaId = Auth::id();

        $postulaciones = PostulacionTransportista::with(['pedido.agricultor'])
            ->where('transportista_id', $transportistaId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('transportista.postulaciones.index', compact('postulaciones'));
    }

    public function transportesAsignados()
    {
        $transportistaId = Auth::id();

        $transportes = Transporte::with(['pedido.agricultor'])
            ->where('transportista_id', $transportistaId)
            ->orderByDesc('fecha_envio')
            ->get();

        return view('transportista.transportes.index', compact('transportes'));
    }

    public function marcarEnCamino($id)
    {
        $transporte = Transporte::findOrFail($id);

        // Verificar que el transporte pertenece al transportista autenticado
        if ($transporte->transportista_id !== Auth::id()) {
            abort(403, 'No tienes permiso para modificar este transporte.');
        }

        // Solo si está pendiente puede cambiar a en_camino
        if ($transporte->estado === 'pendiente') {
            $transporte->estado = 'en_transporte';
            $transporte->save();

            // Cambiar estado del pedido relacionado
            $transporte->pedido->estado = 'en_transporte';
            $transporte->pedido->save();

            return back()->with('success', 'Entrega iniciada correctamente.');
        }

        return back()->with('error', 'No se puede iniciar esta entrega.');
    }

    public function marcarEntregado($id)
    {
        $transporte = Transporte::findOrFail($id);

        // Verificar que el transporte pertenece al transportista autenticado
        if ($transporte->transportista_id !== Auth::id()) {
            abort(403, 'No tienes permiso para modificar este transporte.');
        }

        // Solo si está en camino puede marcarse como entregado
        if ($transporte->estado === 'en_transporte') {
            $transporte->estado = 'entregado';
            $transporte->save();

            // Cambiar estado del pedido relacionado
            $transporte->pedido->estado = 'entregado';
            $transporte->pedido->save();

            return back()->with('success', 'Entrega confirmada con éxito.');
        }

        return back()->with('error', 'Solo se pueden confirmar entregas en camino.');
    }




}
