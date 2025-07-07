@extends('layouts.agricultor')

@section('content')
<div class="bg-white p-4 rounded-md border border-[#a6d6a1] mb-6 shadow-sm">
    <h2 class="text-xl font-bold text-[#1b462b]">👋 ¡Bienvenido de nuevo, {{ Auth::user()->name }}!</h2>
    <p class="text-gray-600 text-sm mt-1">Esperamos que tengas un excelente día gestionando tus productos en AGROS 🌱.</p>
</div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 rounded text-green-800 font-medium">
            {{ session('success') }}
        </div>
    @endif
    

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-extrabold text-[#1b462b]">🌿 Mis Productos</h1>
        <a href="{{ route('productos.create') }}"
           class="bg-[#1b462b] hover:bg-[#163a22] text-white rounded-md px-5 py-2 flex items-center gap-2 font-semibold transition">
            <i class="fas fa-plus"></i>
            Agregar producto
        </a>
    </div>

    @if ($productos->isEmpty())
        <p class="text-gray-600">No tienes productos registrados.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($productos as $producto)
                <article class="bg-white border border-[#a6d6a1] rounded-lg p-4 flex flex-col">
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}"
                             alt="Imagen del producto {{ $producto->nombre }}"
                             class="rounded-md mb-4 w-full h-[200px] object-cover">
                    @else
                        <div class="w-full h-[200px] bg-gray-100 flex items-center justify-center rounded-md mb-4 text-gray-400">
                            Sin imagen
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-1">
                        <h2 class="font-semibold text-lg leading-snug">{{ $producto->nombre }}</h2>
                        <span class="bg-[#dff7d9] text-[#1b462b] text-xs font-semibold rounded-full px-3 py-1 select-none">
                            Disponible
                        </span>
                    </div>

                    <p class="text-sm text-gray-700 mb-1">{{ $producto->stock }} kg disponibles</p>
                    <p class="font-extrabold text-xl text-[#1b462b] mb-2">S/ {{ number_format($producto->precio, 2) }}/kg</p>
                    <p class="text-xs text-gray-500 mb-2">Min: {{ $producto->min_kg_envio }} kg | Max: {{ $producto->max_kg_envio }} kg</p>

                    <div class="mt-auto flex gap-3 pt-4">
                        <a href="{{ route('productos.edit', $producto->id) }}"
                           class="flex items-center gap-2 border border-[#1b462b] rounded-md px-4 py-2 text-[#1b462b] font-semibold hover:bg-[#e6f3e6] transition flex-1 justify-center">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="border border-[#f3a6a6] text-[#d94a4a] rounded-md px-4 py-2 hover:bg-[#fceaea] transition">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
    


    

@endsection
