@extends('layouts.transportista')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-green-700 mb-4">📦 Pedidos disponibles</h1>

    @if($pedidos->isEmpty())
        <p class="text-gray-600">Actualmente no hay pedidos disponibles para transportar.</p>
    @else
        <div class="space-y-6">
            @foreach($pedidos as $pedido)
                <div class="border border-green-200 rounded-lg p-5 bg-[#fefefe] shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <div>
                            <h2 class="text-lg font-bold text-green-800">Pedido de {{ $pedido->agricultor->name }}</h2>
                            <p class="text-sm text-gray-600">📍 Recojo desde: <strong>{{ $pedido->agricultor->direccion }}</strong></p>
                            <p class="text-sm text-gray-600">Dirección de entrega: <strong>{{ $pedido->direccion_entrega }}</strong></p>
                            <p class="text-sm text-gray-600">Total: <strong>{{ $pedido->total_kg }} kg</strong></p>
                            <p class="text-sm text-gray-600">💰 Pago por kg: <strong>S/ {{ number_format($pedido->precio_transporte_kg, 2) }}</strong></p>
                            <p class="text-sm text-gray-700 mt-1">💵 <strong>Total estimado:</strong> S/ {{ number_format($pedido->total_kg * $pedido->precio_transporte_kg, 2) }}</p>
                        </div>
                        <form method="POST" action="{{ route('transportista.postular', $pedido->id) }}">
                            {{-- Ruta real de postulación irá aquí --}}
                            @csrf
                            <button class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">
                                Postularme
                            </button>
                        </form>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-md">
                        <h3 class="font-semibold text-sm mb-2">🧺 Detalles del pedido:</h3>
                        <ul class="list-disc list-inside text-sm text-gray-700">
                            @foreach($pedido->detalles as $detalle)
                                <li>{{ $detalle->producto->nombre }} — {{ $detalle->cantidad }} kg</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
