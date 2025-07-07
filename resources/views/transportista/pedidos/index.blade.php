@extends('layouts.transportista')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#0B5C2E]">📦 Pedidos Disponibles</h1>
        <span class="bg-emerald-100 text-emerald-800 text-sm font-medium px-3 py-1 rounded-full">
            {{ $pedidos->count() }} pedidos disponibles
        </span>
    </div>

    @if($pedidos->isEmpty())
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-md p-4 text-sm">
            Actualmente no hay pedidos disponibles para transportar.
        </div>
    @else
        <div class="space-y-6">
            @foreach($pedidos as $pedido)
                <div class="bg-white border border-emerald-300 rounded-xl shadow-sm hover:shadow-md transition p-5">
                    {{-- Header con agricultor y estado --}}
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-lg font-bold text-emerald-900">Pedido de {{ $pedido->agricultor->name }}</h2>
                        <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                            Disponible
                        </span>
                    </div>

                    {{-- Fila horizontal con datos distribuidos --}}
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 text-sm text-gray-700 mb-4">
                        <div>
                            <div class="flex items-center gap-1 text-gray-500 text-xs mb-1">
                                <i class="fas fa-map-marker-alt"></i> <span>Recojo:</span>
                            </div>
                            <p class="font-semibold text-gray-900">{{ $pedido->agricultor->departamento }}, {{ $pedido->agricultor->provincia }}, {{ $pedido->agricultor->distrito }}</p>
                        </div>

                        <div>
                            <div class="flex items-center gap-1 text-gray-500 text-xs mb-1">
                                <i class="fas fa-map-marker-alt"></i> <span>Entrega:</span>
                            </div>
                            <p class="font-semibold text-gray-900">{{ $pedido->direccion_entrega }}</p>
                        </div>

                        <div>
                            <div class="flex items-center gap-1 text-gray-500 text-xs mb-1">
                                <i class="fas fa-balance-scale"></i> <span>Peso total:</span>
                            </div>
                            <p class="font-semibold text-gray-900">{{ $pedido->total_kg }} kg</p>
                        </div>

                        <div>
                            <div class="flex items-center gap-1 text-gray-500 text-xs mb-1">
                                <i class="fas fa-coins"></i> <span>Pago por kg:</span>
                            </div>
                            <p class="font-semibold text-green-800">S/ {{ number_format($pedido->precio_transporte_kg, 2) }}</p>
                        </div>
                    </div>

                    {{-- Sección total estimado + productos --}}
                    <div class="bg-emerald-50 border border-emerald-200 rounded-md p-4 grid sm:grid-cols-3 gap-4 text-sm text-gray-700 mb-4">
                        <div>
                            <span class="block text-xs text-gray-500 mb-1">💵 Total estimado</span>
                            <p class="font-bold text-emerald-800">S/ {{ number_format($pedido->total_kg * $pedido->precio_transporte_kg, 2) }}</p>
                        </div>
                        <div class="sm:col-span-2">
                            <span class="block text-xs text-gray-500 mb-1">🧺 Productos incluidos</span>
                            <ul class="list-disc list-inside text-sm text-gray-800 space-y-1">
                                @foreach($pedido->detalles as $detalle)
                                    <li>{{ $detalle->producto->nombre }} – {{ $detalle->cantidad }} kg</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Botón final --}}
                    <div class="flex justify-end">
                        <form method="POST" action="{{ route('transportista.postular', $pedido->id) }}">
                            @csrf
                            <button class="flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white px-5 py-2 rounded-md text-sm font-medium transition">
                                <i class="fas fa-check-circle"></i> Postular
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
