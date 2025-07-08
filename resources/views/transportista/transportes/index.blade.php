@extends('layouts.transportista')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-6">
    <h1 class="text-2xl font-extrabold text-[#0B5C2E] mb-6 flex items-center gap-2">
        🚚 Transportes Asignados
    </h1>

    @if($transportes->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-md shadow-sm">
            No tienes transportes asignados actualmente.
        </div>
    @else
        <div class="space-y-6">
            @foreach($transportes as $transporte)
                @php
                    $pedido = $transporte->pedido;
                    $estado = $transporte->estado;
                    $metodoPago = $pedido->pago->metodo_pago ?? null;

                    $estadoInfo = match($estado) {
                        'pendiente' => ['text' => 'text-yellow-700', 'bg' => 'bg-yellow-100', 'label' => '🕒 Pendiente'],
                        'en_transporte' => ['text' => 'text-blue-700', 'bg' => 'bg-blue-100', 'label' => '🚚 En camino'],
                        'entregado' => ['text' => 'text-green-700', 'bg' => 'bg-green-100', 'label' => '✅ Entregado'],
                        default => ['text' => 'text-gray-700', 'bg' => 'bg-gray-100', 'label' => '⏳ Estado desconocido'],
                    };
                @endphp

                <div class="rounded-xl border border-gray-200 shadow bg-white hover:shadow-md transition">
                    <div class="p-5 flex flex-col md:flex-row justify-between gap-6">
                        <div class="flex-1 space-y-2">
                            <div class="flex items-center justify-between">
                                <h2 class="text-lg font-bold text-emerald-800">#Pedido {{ $pedido->id }}</h2>
                                <span class="text-xs px-3 py-1 rounded-full {{ $estadoInfo['bg'] }} {{ $estadoInfo['text'] }}">
                                    {{ $estadoInfo['label'] }}
                                </span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-sm text-gray-700 mt-2">
                                <div>
                                    <p class="font-semibold text-gray-500">Agricultor</p>
                                    <p>{{ $pedido->agricultor->name }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-500">Recojo</p>
                                    <p>{{ $pedido->agricultor->direccion }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-500">Entrega</p>
                                    <p>{{ $pedido->direccion_entrega }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-500">Peso total</p>
                                    <p>{{ $pedido->total_kg }} kg</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-500">Precio x kg</p>
                                    <p>S/ {{ number_format($pedido->precio_transporte_kg, 2) }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-500">Total estimado</p>
                                    <p>S/ {{ number_format($transporte->total_estimado, 2) }}</p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <p class="font-semibold text-gray-500">💳 Pago</p>
                                @if ($metodoPago)
                                    @if ($metodoPago === 'efectivo')
                                        <span class="text-red-600 font-semibold">Cobrar al entregar</span>
                                    @else
                                        <span class="text-green-600 font-semibold">Pagado por {{ ucfirst($metodoPago) }}</span>
                                    @endif
                                @else
                                    <span class="text-gray-500 italic">Sin información de pago</span>
                                @endif
                            </div>
                        </div>

                        {{-- Acción dinámica según estado --}}
                        <div class="flex items-center md:items-start justify-center md:justify-end mt-4 md:mt-0">
                            @if($estado === 'pendiente')
                                <form method="POST" action="{{ route('transportista.transportes.en_camino', $transporte->id) }}">
                                    @csrf
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-semibold">
                                        Iniciar entrega
                                    </button>
                                </form>
                            @elseif($estado === 'en_transporte')
                                <form method="POST" action="{{ route('transportista.transportes.entregado', $transporte->id) }}">
                                    @csrf
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-semibold">
                                        Confirmar entrega
                                    </button>
                                </form>
                            @elseif($estado === 'entregado')
                                <span class="text-green-700 font-bold">✔ Entrega completada</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
