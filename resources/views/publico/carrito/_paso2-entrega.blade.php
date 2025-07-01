<div id="step-2" class="hidden w-full max-w-4xl mx-auto mb-10 px-4">
  <form action="{{ route('carrito.entrega.guardar') }}" method="POST" class="bg-white rounded-2xl p-6 shadow-md">
    @csrf
    <h2 class="text-xl font-bold text-[#0B5C2E] mb-6">🚚 Datos de Entrega</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      {{-- Teléfono --}}
      <div>
        <label class="block text-sm font-medium">Teléfono</label>
        <input type="tel"
               name="telefono_entrega"
               value="{{ old('telefono_entrega', auth()->user()->phone) }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
               required>
      </div>

      {{-- Calle y número --}}
      <div>
        <label class="block text-sm font-medium">Calle y número</label>
        <input type="text"
               name="calle"
               value="{{ old('calle') }}"
               placeholder="Av. Siempre Viva 123"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
               required>
      </div>

      {{-- Distrito --}}
      <div>
        <label class="block text-sm font-medium">Distrito</label>
        <input type="text"
               name="distrito"
               value="{{ old('distrito') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
               required>
      </div>

      {{-- Provincia --}}
      <div>
        <label class="block text-sm font-medium">Provincia</label>
        <input type="text"
               name="provincia"
               value="{{ old('provincia') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
               required>
      </div>

      {{-- Referencias adicionales --}}
      <div class="md:col-span-2">
        <label class="block text-sm font-medium">Referencias adicionales</label>
        <textarea name="referencias"
                  rows="2"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                  placeholder="Junto al parque, portón verde...">{{ old('referencias') }}</textarea>
      </div>
    </div>

    <div class="mt-6 flex justify-between">
      <button type="button"
              id="volver-carrito"
              class="text-[#0B5C2E] hover:underline">
        ← Volver al carrito
      </button>
      <button type="submit"
              class="bg-[#0B5C2E] hover:bg-[#084e28] text-white font-semibold rounded-md px-6 py-2 transition">
        Confirmar Pedido →
      </button>
    </div>
  </form>
</div>
