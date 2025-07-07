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
                        <th class="px-4 py-2">Método de Pago</th> <!-- NUEVO -->

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
                            <td class="px-4 py-2">
                                @if ($pedido->pago)
                                    @if ($pedido->pago->metodo_pago === 'efectivo')
                                        <span class="text-red-600 font-semibold">Contraentrega</span>
                                    @else
                                        <span class="text-green-600 font-semibold">
                                            Pagado ({{ ucfirst($pedido->pago->metodo_pago) }})
                                        </span>
                                    @endif
                                @else
                                    <span class="text-gray-500 italic">N/D</span>
                                @endif
                            </td>

                            <td class="px-4 py-2 capitalize">{{ str_replace('_', ' ', $pedido->estado) }}
                                @if ($pedido->estado === 'pendiente')
                                    <form action="{{ route('agricultor.pedidos.marcarListo', $pedido->id) }}" method="POST" class="mt-2">
                                        @csrf
                                        <div class="flex flex-col space-y-1">
                                            <input type="number" step="0.01" name="precio_transporte_kg" class="border rounded px-2 py-1 text-sm" placeholder="S/ por kg" required>
                                            <button type="submit" class="bg-green-600 text-white text-xs px-3 py-1 rounded hover:bg-green-700">
                                                📦 Marcar como listo para envío
                                            </button>
                                        </div>
                                    </form>
                            
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
