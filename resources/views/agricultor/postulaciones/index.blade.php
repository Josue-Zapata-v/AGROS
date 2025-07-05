@extends('layouts.agricultor')

@section('content')
    <h2 class="text-xl font-bold mb-4">📦 Postulaciones de Transportistas</h2>

    @if($postulaciones->isEmpty())
        <p class="text-gray-600">No hay postulaciones de transportistas por el momento.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left">
                        <th class="p-3">Transportista</th>
                        <th class="p-3">Mensaje</th>
                        <th class="p-3">Pedido</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postulaciones as $postulacion)
                        <tr class="border-t">
                            <td class="p-3">{{ $postulacion->transportista->name }}</td>
                            <td class="p-3">{{ $postulacion->mensaje ?? 'Sin mensaje' }}</td>
                            <td class="p-3">Pedido #{{ $postulacion->pedido_id }}</td>
                            <td class="p-3">
                                @if($postulacion->estado === 'pendiente')
                                    <span class="text-yellow-500 font-semibold">Pendiente</span>
                                @elseif($postulacion->estado === 'aceptado')
                                    <span class="text-green-600 font-semibold">Aceptado</span>
                                @else
                                    <span class="text-red-500 font-semibold">Rechazado</span>
                                @endif
                            </td>
                            <td class="p-3">
                                @if($postulacion->estado === 'pendiente')
                                    <form method="POST" action="{{ route('agricultor.postulaciones.responder', $postulacion->id) }}" class="inline">
                                        @csrf
                                        <input type="hidden" name="accion" value="aceptar">
                                        <button class="text-green-600 hover:underline mr-2">Aceptar</button>
                                    </form>
                                    {{-- Botón Rechazar --}}
                                    <form method="POST" action="{{ route('agricultor.postulaciones.responder', $postulacion->id) }}" class="inline">
                                        @csrf
                                        <input type="hidden" name="accion" value="rechazar">
                                        <button class="text-red-600 hover:underline">Rechazar</button>
                                    </form>

                                @elseif($postulacion->estado === 'rechazado')
                                    @php
                                        $transporteAsignado = \App\Models\Transporte::where('pedido_id', $postulacion->pedido_id)->exists();
                                    @endphp

                                    @if(!$transporteAsignado)
                                        <form method="POST" action="{{ route('agricultor.postulaciones.revertir', $postulacion->id) }}" class="inline">
                                            @csrf
                                            <button class="text-blue-600 hover:underline">Revertir rechazo</button>
                                        </form>
                                    @else
                                        <span class="text-sm text-gray-500">Ya gestionado</span>
                                    @endif
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
