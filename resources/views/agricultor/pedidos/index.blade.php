@extends('layouts.agricultor')

@section('content')
    <h2 class="text-xl font-semibold mb-4">📦 Pedidos Recibidos</h2>

    @if($pedidos->isEmpty())
        <p class="text-gray-600">No hay pedidos recibidos aún.</p>
    @else
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Producto(s)</th>
                        <th class="px-4 py-2">Cantidad Total (kg)</th>
                        <th class="px-4 py-2">Dirección de Entrega</th>
                        <th class="px-4 py-2">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <ul class="list-disc list-inside">
                                    @foreach($pedido->detalles as $detalle)
                                        <li>{{ $detalle->producto->nombre }} ({{ $detalle->cantidad }} kg)</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-4 py-2">{{ $pedido->total_kg }} kg</td>
                            <td class="px-4 py-2">{{ $pedido->direccion_entrega }}</td>
                            <td class="px-4 py-2 capitalize">{{ str_replace('_', ' ', $pedido->estado) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
