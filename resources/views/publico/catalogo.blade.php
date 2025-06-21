@extends('layouts.publico')

@section('title', 'Catálogo de Productos')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <header class="mb-6 bg-[#e9f9e9] p-6 rounded">
        <h1 class="text-2xl font-bold mb-1">Productos Frescos del Perú</h1>
        <p class="text-sm">Encuentra los mejores productos directamente de los agricultores peruanos</p>
    </header>

    {{-- Filtro de búsqueda estático por ahora --}}
    <form class="flex flex-col sm:flex-row gap-3 sm:gap-4 bg-[#e9f9e9] border border-[#c6f0c6] rounded p-4 mb-8">
        <input type="search" placeholder="Buscar productos..."
            class="flex-grow sm:flex-[2] border border-[#c6f0c6] rounded px-4 py-2 text-sm text-[#0f4d3f] placeholder:text-[#0f4d3f]/60 focus:outline-none focus:ring-2 focus:ring-[#0f4d3f]">

        <select class="border border-[#c6f0c6] rounded px-4 py-2 text-sm text-[#0f4d3f] focus:outline-none focus:ring-2 focus:ring-[#0f4d3f] sm:flex-[1]">
            <option>Todas las categorías</option>
        </select>

        <select class="border border-[#c6f0c6] rounded px-4 py-2 text-sm text-[#0f4d3f] focus:outline-none focus:ring-2 focus:ring-[#0f4d3f] sm:flex-[1]">
            <option>Todas las ubicaciones</option>
        </select>

        <button type="submit"
            class="bg-[#0f4d3f] text-white font-semibold flex items-center justify-center gap-2 rounded px-6 py-2 text-sm hover:bg-[#0b3a2c] transition-colors">
            <i class="fas fa-search"></i> Buscar
        </button>
    </form>

    {{-- Catálogo de productos --}}
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($productos as $producto)
            <article class="border border-[#c6f0c6] rounded p-4 flex flex-col">
                <div class="relative mb-3">
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}"
                            alt="Imagen del producto {{ $producto->nombre }}"
                            class="w-full h-48 object-cover rounded">
                    @else
                        <div class="w-full h-48 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-sm">
                            Sin imagen
                        </div>
                    @endif
                </div>

                <h2 class="font-bold text-lg mb-1">{{ $producto->nombre }}</h2>

                <div class="flex justify-between items-center mb-4">
                    <p class="font-extrabold text-xl">
                        S/
                        <span class="text-2xl">{{ number_format($producto->precio, 2) }}</span>
                        <span class="text-lg font-normal">/kg</span>
                    </p>
                    <p class="text-xs text-[#0f4d3f]">
                        Disponible: {{ $producto->stock }} kg
                    </p>
                </div>

                <button onclick="location.href='{{ route('auth.unificado') }}'"
                    class="bg-[#0f4d3f] text-white font-semibold rounded px-4 py-3 flex items-center justify-center gap-2 text-sm hover:bg-[#0b3a2c] transition">
                    <i class="fas fa-shopping-cart"></i> Agregar al Carrito
                </button>
            </article>
        @empty
            <p class="col-span-full text-center text-gray-600">No hay productos disponibles por el momento.</p>
        @endforelse
    </section>

    {{-- Paginación --}}
    <div class="mt-8">
        {{ $productos->links() }}
    </div>
</div>
@endsection
