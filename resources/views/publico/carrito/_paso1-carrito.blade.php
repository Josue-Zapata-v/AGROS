<div id="step-1">
  @if(session('carrito') && count(session('carrito')) > 0)
    @php
      $carrito     = session('carrito');
      $totalKg     = 0;
      $totalPrecio = 0;
    @endphp

    <section class="flex flex-col lg:flex-row gap-8 max-w-6xl mx-auto px-4 lg:px-0 mb-16">
      <!-- Productos en el carrito -->
      <section class="bg-white rounded-2xl p-6 lg:p-8 shadow-md flex-1 max-w-full lg:max-w-[640px]">
        <h2 class="text-xl font-extrabold text-[#0B5C2E] mb-6">Productos en tu carrito</h2>

        @foreach($carrito as $item)
          @php
            $subtotal     = $item['precio'] * $item['cantidad'];
            $totalKg     += $item['cantidad'];
            $totalPrecio += $subtotal;
          @endphp

          <article class="flex flex-col sm:flex-row gap-4 items-center sm:items-start border border-gray-200 rounded-xl p-4 mb-5 shadow-sm transition hover:shadow-md">
            <!-- Imagen del producto -->
            <div class="w-20 h-20 flex items-center justify-center bg-gradient-to-br from-[#DFF6E4] to-[#F9E6C8] rounded-xl overflow-hidden">
              <img src="{{ $item['imagen'] ?? 'https://via.placeholder.com/40' }}" alt="{{ $item['nombre'] }}" class="w-12 h-12 object-contain" />
            </div>

            <!-- Detalles del producto -->
            <div class="flex-1 min-w-0 text-left">
              <h3 class="text-base font-semibold text-[#0B5C2E]">{{ $item['nombre'] }}</h3>
              <p class="text-sm text-gray-500 mb-1">por {{ $item['agricultor'] ?? 'Productor' }}</p>
              <p class="text-lg font-bold text-[#0B5C2E]">
                S/ {{ number_format($item['precio'], 2) }} <span class="text-sm font-normal text-gray-600">/kg</span>
              </p>
            </div>

            <!-- Controles de cantidad -->
            <div class="flex items-center gap-2 mt-4 sm:mt-0">
              <button class="btn-decrement w-9 h-9 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-100 transition" data-id="{{ $item['id'] }}">−</button>
              <span class="w-12 text-center font-semibold text-sm" id="cantidad-{{ $item['id'] }}">{{ $item['cantidad'] }} kg</span>
              <button class="btn-increment w-9 h-9 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-100 transition" data-id="{{ $item['id'] }}">+</button>
            </div>

            <form action="{{ route('carrito.eliminar', $item['id']) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-gray-400 hover:text-gray-600 transition-colors w-9 h-9 flex items-center justify-center">
                <i class="fas fa-trash text-lg"></i>
              </button>
            </form>

          </article>
        @endforeach
      </section>

      <!-- Resumen del Pedido -->
      <aside class="bg-white rounded-2xl p-6 lg:p-8 max-w-xs w-full shadow-md flex-shrink-0">
        <h2 class="text-xl font-extrabold text-[#0B5C2E] mb-6">Resumen del Pedido</h2>

        <!-- Lista de productos -->
        <dl class="space-y-3 text-sm text-gray-900 mb-6">
          @foreach($carrito as $item)
            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
              <div class="flex items-center gap-1 max-w-[60%]">
                <dt class="text-gray-700 font-medium truncate" id="nombre-{{ $item['id'] }}">{{ $item['nombre'] }}</dt>
                <span class="text-xs text-gray-500 whitespace-nowrap">(<span id="cantidad-lista-{{ $item['id'] }}">{{ $item['cantidad'] }}</span> kg)</span>
              </div>
              <dd class="text-sm font-semibold text-gray-800 text-right" id="subtotal-{{ $item['id'] }}" data-subtotal="{{ number_format($item['cantidad'] * $item['precio'], 2, '.', '') }}">
                S/ {{ number_format($item['cantidad'] * $item['precio'], 2) }}
              </dd>
            </div>
          @endforeach
        </dl>

        <!-- Totales -->
        <dl class="space-y-2 text-sm text-gray-900 mb-6">
          <div class="flex justify-between">
            <dt class="text-gray-700 font-semibold">Total kg:</dt>
            <dd id="total-kg" class="font-bold">{{ $totalKg }} kg</dd>
          </div>
          <div class="flex justify-between items-center border-t border-gray-200 pt-3">
            <dt class="text-lg font-extrabold text-[#0B5C2E]">Total a pagar:</dt>
            <dd id="total-price" class="text-lg font-extrabold text-[#0B5C2E]">S/ {{ number_format($totalPrecio, 2) }}</dd>
          </div>
        </dl>

        <!-- Botón continuar -->
        <button id="continuar-entrega" class="w-full bg-[#F97316] hover:bg-[#ea7a1a] text-white font-semibold rounded-md py-3 transition-colors shadow-sm">
          Continuar con la entrega 
        </button>
      </aside>
    </section>

  @else
    <p class="text-green-700">Tu carrito está vacío.</p>
  @endif
</div>
