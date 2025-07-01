@extends('layouts.publico')

@section('title', $producto->nombre)

@section('content')
<div class="bg-gradient-to-b from-green-100 to-green-50 p-6 sm:p-8 md:p-12">
  <div class="max-w-6xl mx-auto">

    <!-- Breadcrumb -->
    <nav class="text-sm font-medium text-green-800 mb-6">
      <ul class="flex items-center space-x-2">
        <li>
          <a href="{{ route('comprador.dashboard') }}" class="flex items-center space-x-1 hover:text-green-700">
            <i class="fas fa-arrow-left text-xs"></i>
            <span>Volver a productos</span>
          </a>
        </li>
        <li>/</li>
        @foreach($producto->categorias as $categoria)
          <li class="hover:text-green-700">
            <a href="#">{{ $categoria->nombre }}</a>
          </li>
          <li>/</li>
        @endforeach
        <li class="font-semibold text-green-900">{{ $producto->nombre }}</li>
      </ul>
    </nav>

    <div class="flex flex-col lg:flex-row gap-8">

      <!-- Left: Image -->
      <div class="lg:w-1/2">
        @if($producto->imagen)
          <div class="bg-white rounded-xl shadow-lg overflow-hidden aspect-w-4 aspect-h-3">
            <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" class="object-contain w-full h-full" />
          </div>
        @endif
      </div>

      <!-- Right: Details -->
      <div class="lg:w-1/2 space-y-6">

        <!-- Tags -->
        <div class="flex flex-wrap gap-2">
          @foreach($producto->categorias as $categoria)
            <span class="text-xs font-semibold text-green-900 bg-green-200 rounded-full px-3 py-1">
              {{ $categoria->nombre }}
            </span>
          @endforeach
        </div>

        <!-- Title & Description -->
        <h1 class="text-2xl lg:text-3xl font-bold text-green-900 leading-tight">{{ $producto->nombre }}</h1>
        <p class="text-sm text-green-800 leading-relaxed">{{ $producto->descripcion }}</p>

        <!-- Seller Info -->
        <div class="flex items-center bg-white border border-green-200 rounded-lg shadow-sm p-4">
          <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
            <i class="fas fa-user text-green-700"></i>
          </div>
          <div class="ml-3 text-green-800">
            <p class="font-semibold flex items-center space-x-2">
              <span>{{ $producto->agricultor->name }}</span>
              <span class="text-yellow-400 flex items-center space-x-1">
                <i class="fas fa-star"></i><span>4.8</span>
              </span>
            </p>
            <p class="text-xs flex items-center space-x-1">
              <i class="fas fa-map-marker-alt text-green-700"></i>
              <span>{{ $producto->ubicacion ?? 'Sin ubicación' }}</span>
            </p>
          </div>
        </div>

        <!-- Price & Quantity -->
        <div class="bg-white border border-green-200 rounded-lg shadow-sm p-6 space-y-4">
          <div class="flex justify-between items-center">
            <p class="text-xl font-bold text-green-900">S/ {{ number_format($producto->precio, 2) }} <span class="font-normal text-green-700">por kg</span></p>
            <p class="text-sm font-semibold text-green-800 flex items-center space-x-1">
              <i class="fas fa-box-open"></i><span>{{ $producto->stock }} kg disponibles</span>
            </p>
          </div>

          <div class="space-y-2">
            <label for="cantidad" class="text-sm font-medium text-green-800">Cantidad (kg)</label>
            <div class="inline-flex items-center border border-green-200 rounded-lg overflow-hidden">
              <button id="decrement" type="button" class="px-3 py-2 text-lg font-semibold text-green-700 disabled:opacity-50">-</button>
              <input id="cantidad" type="number" min="{{ $producto->min_kg_envio }}" max="{{ $producto->max_kg_envio }}" value="{{ $producto->min_kg_envio }}" class="w-16 text-center text-green-800 font-semibold focus:outline-none" />
              <button id="increment" type="button" class="px-3 py-2 text-lg font-semibold text-green-700 disabled:opacity-50">+</button>
            </div>
          </div>

          <div class="flex justify-between items-center font-semibold text-green-900">
            <span>Total:</span>
            <span id="total-price">S/ {{ number_format($producto->precio * $producto->min_kg_envio, 2) }}</span>
          </div>

          <form method="POST" action="{{ route('carrito.agregar') }}">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
            <input type="hidden" name="cantidad" id="cantidad-form" value="{{ $producto->min_kg_envio }}">

            <button type="submit"
              class="w-full py-3 rounded-lg bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white text-lg font-semibold shadow-md hover:shadow-lg transition">
              <i class="fas fa-shopping-cart mr-2"></i> Agregar al Carrito
            </button>
          </form>

        <!-- Características -->
        @if($producto->caracteristicas)
            @php
                // Separa por dos o más espacios
                $caracteristicas = preg_split('/\s{2,}/', trim($producto->caracteristicas));
                $caracteristicasAgrupadas = array_chunk($caracteristicas, 2);
            @endphp

            <div class="bg-white border border-green-200 rounded-lg shadow-sm p-4">
                <h2 class="text-lg font-semibold text-green-900 mb-3">Características del Producto</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 text-green-800">
                    @foreach($caracteristicasAgrupadas as $grupo)
                        @foreach($grupo as $carac)
                            <div class="flex items-start gap-2">
                                <span class="text-green-700 text-lg leading-none">•</span>
                                <span>{{ $carac }}</span>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Info Extras -->
        <div class="grid grid-cols-3 gap-4 text-center text-green-800 text-sm">
          <div class="flex flex-col items-center p-3 bg-white border border-green-200 rounded-lg shadow-sm">
            <i class="fas fa-truck text-xl mb-1"></i>
            <span>Envío Seguro</span>
          </div>
          <div class="flex flex-col items-center p-3 bg-white border border-green-200 rounded-lg shadow-sm">
            <i class="fas fa-shield-alt text-xl mb-1"></i>
            <span>Calidad Garantizada</span>
          </div>
          <div class="flex flex-col items-center p-3 bg-white border border-green-200 rounded-lg shadow-sm">
            <i class="fas fa-seedling text-xl mb-1"></i>
            <span>100% Orgánico</span>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const decrementBtn = document.getElementById('decrement');
    const incrementBtn = document.getElementById('increment');
    const cantidadInput = document.getElementById('cantidad');
    const totalPriceEl = document.getElementById('total-price');
    const minVal = {{ $producto->min_kg_envio }};
    const maxVal = {{ $producto->max_kg_envio }};
    const pricePerKg = parseFloat("{{ number_format($producto->precio, 2, '.', '') }}");

    function updateButtons(qty) {
      decrementBtn.disabled = qty <= minVal;
      incrementBtn.disabled = qty >= maxVal;
    }

    function updateTotal() {
      let qty = parseInt(cantidadInput.value, 10) || minVal;
      qty = Math.min(Math.max(qty, minVal), maxVal);
      cantidadInput.value = qty;
      updateButtons(qty);
      totalPriceEl.textContent = `S/ ${(qty * pricePerKg).toFixed(2)}`;
    }

    updateTotal();

    decrementBtn.addEventListener('click', () => { cantidadInput.value--; updateTotal(); });
    incrementBtn.addEventListener('click', () => { cantidadInput.value++; updateTotal(); });
    cantidadInput.addEventListener('input', updateTotal);
  });
</script>
@endpush

@endsection
