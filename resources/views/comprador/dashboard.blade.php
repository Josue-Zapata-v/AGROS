@extends('layouts.publico')

@section('title', 'Dashboard Comprador')

@section('content')
<!-- Fondo con patrón orgánico -->
<div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 relative z-0">
    <!-- Elementos decorativos de fondo -->
    <div class="absolute inset-0 opacity-10 z-0 pointer-events-none">
        <div class="absolute top-20 left-10 w-32 h-32 bg-green-300 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-emerald-300 rounded-full blur-2xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-teal-300 rounded-full blur-3xl animate-pulse delay-2000"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative z-10">
        {{-- Encabezado mejorado --}}
        <section class="mb-10 text-center animate-fade-in">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-600 to-emerald-600 rounded-full mb-4 shadow-md animate-bounce-slow">
                <i class="fas fa-leaf text-2xl text-white"></i>
            </div>

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold bg-gradient-to-r from-green-800 via-emerald-700 to-teal-700 bg-clip-text text-transparent mb-3 animate-slide-up">
                Productos frescos del Perú
            </h1>

            <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto animate-slide-up-delay">
                Conectamos directamente con nuestros agricultores peruanos para traerte lo mejor de nuestra tierra.
            </p>

            <div class="flex items-center justify-center mt-5 space-x-6 animate-slide-up-delay-2 text-green-600 text-xs sm:text-sm">
                <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>100% fresco</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-truck mr-2"></i>
                <span>Envío rápido</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-heart mr-2"></i>
                <span>Directo del campo</span>
            </div>
            </div>
        </section>

        {{-- Filtros de búsqueda refinados --}}
        <section>
            <div class="mb-16 animate-fade-in">
                <div class="bg-white/90 backdrop-blur-lg shadow-md rounded-2xl border border-gray-200 p-8 transition-all duration-300 hover:shadow-lg">

                    <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                        {{-- Búsqueda --}}
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="search" placeholder="Buscar productos..."
                                class="pl-10 pr-4 py-3 w-full rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm text-gray-800 placeholder-gray-400 transition-all duration-300">
                        </div>

                        {{-- Categorías --}}
                        <div class="relative">
                            <i class="fas fa-tags absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                            <select
                                class="pl-10 pr-8 py-3 w-full rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm text-gray-800 appearance-none">
                                <option selected>Todas las categorías</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                        </div>

                        {{-- Ubicaciones --}}
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                            <select
                                class="pl-10 pr-8 py-3 w-full rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm text-gray-800 appearance-none">
                                <option selected>Todas las ubicaciones</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                        </div>

                        {{-- Botón --}}
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl px-6 py-3 text-sm flex items-center justify-center gap-2 transition-all duration-300 shadow-sm hover:shadow-md">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </form>
                </div>
            </div>
        </section>


        {{-- Catálogo de productos mejorado --}}
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse ($productos as $index => $producto)
                <article class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 p-5 flex flex-col animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s">
            
                    {{-- Imagen del producto --}}
                    <div class="relative mb-4 rounded-xl overflow-hidden h-48">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}"
                                alt="Imagen del producto {{ $producto->nombre }}"
                                class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        @else
                            <div class="w-full h-full bg-gray-100 flex flex-col items-center justify-center text-gray-400">
                                <i class="fas fa-image text-3xl mb-1"></i>
                                <span class="text-xs">Sin imagen</span>
                            </div>
                        @endif
                    </div>

                    {{-- Nombre del producto --}}
                    <h2 class="text-lg font-semibold text-gray-800 mb-1 leading-snug group-hover:text-green-700 transition-colors">
                        {{ $producto->nombre }}
                    </h2>

                    {{-- Ubicación y agricultor --}}
                    <div class="text-sm text-gray-600 space-y-1 mb-3">
                        <p><i class="fas fa-map-marker-alt text-green-500 mr-1"></i>{{ $producto->ubicacion }}</p>
                        <p><i class="fas fa-user text-blue-500 mr-1"></i>Por {{ $producto->agricultor->name }}</p>
                    </div>

                    {{-- Precio y stock --}}
                    <div class="bg-gray-50 border border-gray-100 rounded-lg px-4 py-3 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-green-700 font-bold text-base">S/ {{ number_format($producto->precio, 2) }}</p>
                                <p class="text-xs text-gray-500">por kilogramo</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Stock</p>
                                <p class="text-sm font-medium text-green-600">{{ $producto->stock }} kg</p>
                            </div>
                        </div>
                    </div>

                    {{-- Botones de acción --}}
                    <div class="mt-auto flex flex-col gap-2">
                        <a href="{{ route('comprador.productos.show', $producto->id) }}"
                            class="text-green-600 border border-green-500 hover:bg-green-50 rounded-lg px-4 py-2 text-sm text-center font-medium transition">
                            <i class="fas fa-info-circle mr-1"></i>Ver Detalles
                        </a>
                        <form class="form-agregar-carrito" data-producto-id="{{ $producto->id }}">
                            @csrf
                            <input type="hidden" name="cantidad" value="{{ $producto->min_kg_envio }}">
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white rounded-lg px-4 py-2 text-sm text-center font-semibold transition w-full">
                                <i class="fas fa-shopping-cart mr-1"></i>Agregar al Carrito
                            </button>
                        </form>

                    </div>
                </article>
     
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20">
                    <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-seedling text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No hay productos disponibles</h3>
                    <p class="text-gray-500 text-center max-w-md">
                        Por el momento no tenemos productos que coincidan con tu búsqueda. 
                        ¡Vuelve pronto para ver las novedades!
                    </p>
                </div>
            @endforelse
        </section>

        

        
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.form-agregar-carrito').forEach(form => {
        form.addEventListener('submit', async e => {
            e.preventDefault();

            const productoId = form.dataset.productoId;
            const cantidad   = form.querySelector('[name="cantidad"]').value;

            const res = await fetch("{{ route('carrito.agregar') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    producto_id: productoId,
                    cantidad: cantidad
                })
            });

            if (res.ok) {
                const data = await res.json();

                const carritoContador = document.getElementById('contador-carrito');
                if (carritoContador) {
                    carritoContador.textContent = data.total_items;
                }

                alert('✅ Producto agregado al carrito');
            } else {
                alert('❌ Error al agregar producto');
            }
        });
    });
});
</script>
@endpush
