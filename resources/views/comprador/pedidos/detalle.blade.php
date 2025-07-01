@extends('layouts.publico')

@section('title', 'Detalle del Pedido')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">

    {{-- Botón regresar --}}
    <a href="{{ route('comprador.pedidos') }}" class="inline-flex items-center text-green-700 hover:underline font-medium mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Volver a mis pedidos
    </a>

    {{-- Cabecera del pedido --}}
    <div class="bg-[#ECFDF5] border border-green-200 rounded-2xl p-6 shadow-sm mb-10">
        <h2 class="text-2xl font-extrabold text-green-900 mb-2">📦 Pedido #AGR-{{ str_pad($pedido->id, 4, '0', STR_PAD_LEFT) }}</h2>
        <div class="text-sm text-gray-700">
            <p><strong>Estado:</strong>
                <span class="inline-block px-3 py-1 rounded-full text-white 
                    {{ 
                        $pedido->estado === 'pendiente' ? 'bg-yellow-500' :
                        ($pedido->estado === 'enviado' ? 'bg-blue-500' :
                        ($pedido->estado === 'entregado' ? 'bg-green-600' : 'bg-gray-400'))
                    }}">
                    {{ ucfirst($pedido->estado) }}
                </span>
            </p>
            <p class="mt-1"><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    {{-- Productos del pedido --}}
    <h3 class="text-xl font-bold text-green-800 mb-4">🛒 Productos del Pedido</h3>
    <div class="grid md:grid-cols-2 gap-6 mb-10">
        @foreach($pedido->detalles as $detalle)
        @php $producto = $detalle->producto; @endphp
        <div class="bg-white shadow rounded-xl p-5 flex items-start gap-5">
            {{-- Imagen --}}
            <div class="w-24 h-24 flex-shrink-0 rounded overflow-hidden bg-gray-100 border">
                @if($producto && $producto->imagen)
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="object-cover w-full h-full">
                @else
                    <div class="flex items-center justify-center w-full h-full text-sm text-gray-400">Sin imagen</div>
                @endif
            </div>

            {{-- Info --}}
            <div class="flex-1">
                <h4 class="font-bold text-green-900 text-lg">{{ $producto->nombre ?? 'Producto no disponible' }}</h4>
                <p class="text-sm text-gray-700">Cantidad: <span class="font-medium">{{ $detalle->cantidad }} kg</span></p>
                <p class="text-sm text-gray-700">Precio unitario: <span class="font-medium">S/ {{ number_format($detalle->precio_unitario, 2) }}</span></p>
                <p class="text-sm text-gray-700 mt-1 font-semibold">Subtotal: S/ {{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</p>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Información adicional --}}
    <div class="grid md:grid-cols-2 gap-6">
        {{-- Dirección --}}
        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-green-600">
            <h3 class="text-lg font-bold text-green-700 mb-3">📍 Dirección de Entrega</h3>
            <p class="text-gray-800 mb-1"><strong>Dirección:</strong> {{ $pedido->direccion_entrega }}</p>
            <p class="text-gray-800"><strong>Teléfono:</strong> {{ $pedido->telefono_entrega }}</p>
        </div>

        {{-- Resumen --}}
        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-green-600">
            <h3 class="text-lg font-bold text-green-700 mb-3">📊 Resumen del Pedido</h3>
            <p class="text-gray-800 mb-1"><strong>Total de kilogramos:</strong> {{ $pedido->total_kg }} kg</p>
            <p class="text-gray-800 text-lg font-bold"><strong>Total a pagar:</strong> S/ {{ number_format($pedido->total_precio, 2) }}</p>
        </div>
    </div>

</div>
@endsection
