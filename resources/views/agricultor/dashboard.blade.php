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

                        @if ($producto->stock > 0)
                            <span class="bg-[#dff7d9] text-[#1b462b] text-xs font-semibold rounded-full px-3 py-1 select-none">
                                Disponible
                            </span>
                        @else
                            <span class="bg-[#fceaea] text-[#d94a4a] text-xs font-semibold rounded-full px-3 py-1 select-none">
                                Agotado
                            </span>
                        @endif
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
                        {{-- Contenedor Alpine --}}
                        <div x-data="{ open: false }" class="relative flex-1 flex justify-center">
                            <!-- Botón que abre el modal -->
                            <button type="button"
                                @click="open = true"
                                class="border border-[#f3a6a6] text-[#d94a4a] rounded-md px-4 py-2 hover:bg-[#fceaea] transition">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <!-- Modal de confirmación -->
                            <div x-show="open" x-cloak
                                class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                                <div class="bg-white rounded-xl p-6 max-w-sm shadow-lg border border-red-200 w-full mx-4">
                                    <h2 class="text-lg font-bold text-red-700 mb-2">¿Eliminar producto?</h2>
                                    <p class="text-gray-600 mb-4">Esta acción no se puede deshacer. ¿Estás seguro?</p>

                                    <div class="flex justify-end gap-3">
                                        <button @click="open = false" type="button"
                                            class="px-4 py-2 rounded-md text-sm bg-gray-200 hover:bg-gray-300 text-gray-800">
                                            Cancelar
                                        </button>

                                        <!-- Único formulario de eliminación -->
                                        <form method="POST" action="{{ route('productos.destroy', $producto->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-4 py-2 rounded-md text-sm bg-red-600 hover:bg-red-700 text-white font-semibold">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
    


    

@endsection
