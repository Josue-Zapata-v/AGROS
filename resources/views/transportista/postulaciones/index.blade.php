@extends('layouts.transportista')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-6">
    <h1 class="text-2xl font-extrabold text-[#0B5C2E] mb-6 flex items-center gap-2">
        Mis Postulaciones
    </h1>

    @if($postulaciones->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-md shadow-sm">
            No tienes postulaciones activas por el momento.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($postulaciones as $postulacion)
                @php
                    $pedido = $postulacion->pedido;
                    $estado = $postulacion->estado;

                    $estilos = match($estado) {
                        'pendiente' => ['text' => 'text-yellow-700', 'bg' => 'bg-yellow-100', 'icon' => '⏳'],
                        'aceptado' => ['text' => 'text-green-700', 'bg' => 'bg-green-100', 'icon' => '✅'],
                        'rechazado' => ['text' => 'text-red-700', 'bg' => 'bg-red-100', 'icon' => '❌'],
                        default => ['text' => 'text-gray-700', 'bg' => 'bg-gray-100', 'icon' => 'ℹ️'],
                    };
                @endphp

                <div class="relative rounded-xl border border-gray-200 shadow-md bg-white hover:shadow-lg transition-all p-5 flex flex-col justify-between">
                    <div class="mb-4">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-lg font-bold text-emerald-800">#Pedido {{ $pedido->id }}</h2>
                            <span class="text-xs px-3 py-1 rounded-full {{ $estilos['bg'] }} {{ $estilos['text'] }}">
                                {{ $estilos['icon'] }} {{ ucfirst($estado) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 mb-1"> <strong>Agricultor:</strong> {{ $pedido->agricultor->name }}</p>
                        <p class="text-sm text-gray-500 mb-1"> <strong>Destino:</strong> {{ $pedido->direccion_entrega }}</p>
                        <p class="text-sm text-gray-500"> <strong>Peso:</strong> {{ $pedido->total_kg }} kg</p>
                    </div>

                    
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
