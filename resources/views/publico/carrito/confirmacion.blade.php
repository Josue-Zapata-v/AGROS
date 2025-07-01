@extends('layouts.publico')

@section('title', 'Confirmación de Pedido')

@section('content')
<div class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
  <div class="bg-white rounded-lg shadow-md w-full max-w-2xl p-10 text-center">

    {{-- Icono de éxito --}}
    <div class="mb-6">
        <i class="fas fa-check-circle text-[#4ADE80] text-6xl"></i>
    </div>

    {{-- Título --}}
    <h1 class="text-2xl sm:text-3xl font-extrabold text-green-700 mb-3">¡Pedido Confirmado!</h1>

    {{-- Subtítulo --}}
    <p class="text-gray-700 mb-8 px-6 text-base sm:text-lg">
      Tu pedido ha sido registrado correctamente. Pronto recibirás notificaciones sobre el estado del transporte.
    </p>

    {{-- Detalles del pedido --}}
    <div class="flex justify-center">
        <div class="bg-green-50 text-green-800 rounded-md py-5 px-8 mb-8 text-left text-sm sm:text-base space-y-4 w-full max-w-md">

            <p class="font-semibold flex items-start gap-3">
                <span>
                    <span class="font-extrabold">Dirección de entrega:</span><br>
                    {{ $pedido->direccion_entrega }}
                </span>
            </p>

            <p class="font-semibold flex items-start gap-3">
                <span>
                    <span class="font-extrabold">Teléfono:</span> {{ $pedido->telefono_entrega }}
                </span>
            </p>

            <p class="font-semibold flex items-start gap-3">
                <span>
                    <span class="font-extrabold">Número de pedido:</span> #{{ $numeroPedido }}
                </span>
            </p>

            <p class="font-semibold flex items-start gap-3">
                <span>
                    <span class="font-extrabold">Total de kilogramos:</span> {{ $pedido->total_kg }} kg
                </span>
            </p>

            <p class="font-semibold flex items-start gap-3">
                <span>
                    <span class="font-extrabold">Total:</span> S/ {{ number_format($pedido->total_precio, 2) }}
                </span>
            </p>

            
        </div>
    </div>


    {{-- Botón (sin acción aún) --}}
    <button
      class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md px-8 py-3 transition-colors w-full max-w-sm mx-auto"
      type="button"
    >
      Ver seguimiento del pedido
    </button>

  </div>
</div>
@endsection
