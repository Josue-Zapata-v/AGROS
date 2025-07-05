@extends('layouts.transportista')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-green-700 mb-4">🚚 Transportes asignados</h1>

    @if($transportes->isEmpty())
        <p class="text-gray-600">No tienes transportes asignados actualmente.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left">
                        <th class="p-3">Pedido</th>
                        <th class="p-3">Agricultor</th>
                        <th class="p-3">Recojo</th>
                        <th class="p-3">Entrega</th>
                        <th class="p-3">Kg</th>
                        <th class="p-3">Precio x kg</th>
                        <th class="p-3">Total</th>
                        <th class="p-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transportes as $transporte)
                        <tr class="border-t">
                            <td class="p-3">#{{ $transporte->pedido->id }}</td>
                            <td class="p-3">{{ $transporte->pedido->agricultor->name }}</td>
                            <td class="p-3">{{ $transporte->pedido->agricultor->direccion }}</td>
                            <td class="p-3">{{ $transporte->pedido->direccion_entrega }}</td>
                            <td class="p-3">{{ $transporte->pedido->total_kg }} kg</td>
                            <td class="p-3">S/ {{ number_format($transporte->pedido->precio_transporte_kg, 2) }}</td>
                            <td class="p-3">S/ {{ number_format($transporte->total_estimado, 2) }}</td>
                            <td class="p-3">
                                @if($transporte->estado === 'pendiente')
                                    <form method="POST" action="{{ route('transportista.transportes.en_camino', $transporte->id) }}">
                                        @csrf
                                        <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                            Iniciar entrega
                                        </button>
                                    </form>
                                @elseif($transporte->estado === 'en_camino')
                                    <form method="POST" action="{{ route('transportista.transportes.entregado', $transporte->id) }}">
                                        @csrf
                                        <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                            Confirmar entrega
                                        </button>
                                    </form>
                                @elseif($transporte->estado === 'entregado')
                                    <span class="text-green-600 font-semibold">✅ Entregado</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
