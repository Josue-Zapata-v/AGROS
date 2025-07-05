@extends('layouts.transportista')

@section('content')
    <h2 class="text-xl font-bold mb-4">📄 Mis Postulaciones</h2>

    @if($postulaciones->isEmpty())
        <p class="text-gray-600">No tienes postulaciones registradas.</p>
    @else
        <table class="w-full bg-white rounded shadow">
            <thead class="bg-green-100 text-green-900">
                <tr>
                    <th class="p-3 text-left">Pedido</th>
                    <th class="p-3 text-left">Agricultor</th>
                    <th class="p-3 text-left">Dirección Entrega</th>
                    <th class="p-3 text-left">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($postulaciones as $postulacion)
                    <tr class="border-t">
                        <td class="p-3">Pedido #{{ $postulacion->pedido->id }}</td>
                        <td class="p-3">{{ $postulacion->pedido->agricultor->name }}</td>
                        <td class="p-3">{{ $postulacion->pedido->direccion_entrega }}</td>
                        <td class="p-3">
                            @if($postulacion->estado === 'pendiente')
                                <span class="text-yellow-600 font-semibold">⏳ Pendiente</span>
                            @elseif($postulacion->estado === 'aceptado')
                                <span class="text-green-600 font-semibold">✅ Aceptado</span>
                            @else
                                <span class="text-red-600 font-semibold">❌ Rechazado</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
