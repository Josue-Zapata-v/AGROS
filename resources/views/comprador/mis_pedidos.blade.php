@extends('layouts.publico')

@section('title', 'Mis Pedidos')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-green-700 mb-6">📦 Mis Pedidos</h1>

    @if($pedidos->isEmpty())
        <p class="text-gray-600">Aún no has realizado ningún pedido.</p>
    @else
        <div class="grid gap-6">
            @foreach($pedidos as $pedido)
                <div class="bg-white border border-green-100 rounded-xl shadow-sm p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-green-800">
                            #AGR-{{ str_pad($pedido->id, 4, '0', STR_PAD_LEFT) }}
                        </h2>
                        <span class="text-sm px-3 py-1 rounded-full 
                            {{ 
                                $pedido->estado === 'pendiente' ? 'bg-yellow-100 text-yellow-800' :
                                ($pedido->estado === 'enviado' ? 'bg-blue-100 text-blue-800' :
                                ($pedido->estado === 'entregado' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'))
                            }}">
                            {{ ucfirst($pedido->estado) }}
                        </span>
                    </div>

                    <div class="text-sm text-gray-700 mb-2">
                        <span class="font-medium">Fecha:</span> {{ $pedido->created_at->format('d/m/Y') }}
                    </div>

                    <div class="text-sm text-gray-700 mb-4">
                        <span class="font-medium">Producto(s):</span>
                        <ul class="list-disc list-inside mt-1">
                            @foreach($pedido->detalles as $detalle)
                                <li>
                                    @if ($detalle->producto)
                                        {{ $detalle->producto->nombre }} ({{ $detalle->cantidad }} kg)
                                    @else
                                        <span class="text-red-600">Producto no encontrado (ID: {{ $detalle->producto_id }})</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex justify-between text-sm font-semibold text-green-900">
                        <span>Total Kg: {{ $pedido->total_kg }} kg</span>
                        <span>Total: S/ {{ number_format($pedido->total_precio, 2) }}</span>
                    </div>
                            
                    {{-- Botón Ver Detalles --}}
                    <div class="text-right">
                        <a href="{{ route('comprador.detalle', $pedido->id) }}"
                            class="inline-block bg-green-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-green-700 transition">
                                Ver detalles →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
