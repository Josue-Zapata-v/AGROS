<div id="step-2" class="hidden w-full max-w-4xl mx-auto mb-10 px-4 text-[#065f46] text-[13px]">
  <form action="{{ route('carrito.entrega.guardar') }}" method="POST" class="bg-white rounded-2xl p-6 shadow-md border border-[#a7f3d0] space-y-6">
    @csrf

    <!-- Dirección de Entrega -->
    <section class="space-y-4">
      <h2 class="flex items-center text-[#065f46] font-semibold text-[15px]">
        <i class="fas fa-map-marker-alt mr-2 text-[15px]"></i>
        Dirección de Entrega
      </h2>
      <p class="text-[11px] text-[#065f46] -mt-1 mb-2">
        ¿Dónde quieres recibir tu pedido?
      </p>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        {{-- Teléfono --}}
        <div>
          <label for="telefono_entrega" class="block text-[11px] font-normal mb-1">Teléfono</label>
          <input type="tel" name="telefono_entrega"
                 value="{{ old('telefono_entrega', auth()->user()->phone) }}"
                 class="w-full border border-[#a7f3d0] rounded-md px-3 py-2 text-[12px] placeholder:text-[#a7f3d0] focus:outline-none focus:ring-1 focus:ring-[#a7f3d0]"
                 placeholder="+51 987 654 321" required>
        </div>

        {{-- Calle --}}
        <div>
          <label for="calle" class="block text-[11px] font-normal mb-1">Calle y número</label>
          <input type="text" name="calle"
                 value="{{ old('calle') }}"
                 class="w-full border border-[#a7f3d0] rounded-md px-3 py-2 text-[12px] placeholder:text-[#a7f3d0] focus:outline-none focus:ring-1 focus:ring-[#a7f3d0]"
                 placeholder="Av. Siempre Viva 123" required>
        </div>

        {{-- Distrito --}}
        <div>
          <label for="distrito" class="block text-[11px] font-normal mb-1">Distrito</label>
          <input type="text" name="distrito"
                 value="{{ old('distrito') }}"
                 class="w-full border border-[#a7f3d0] rounded-md px-3 py-2 text-[12px] placeholder:text-[#a7f3d0] focus:outline-none focus:ring-1 focus:ring-[#a7f3d0]"
                 required>
        </div>

        {{-- Provincia --}}
        <div>
          <label for="provincia" class="block text-[11px] font-normal mb-1">Provincia</label>
          <input type="text" name="provincia"
                 value="{{ old('provincia') }}"
                 class="w-full border border-[#a7f3d0] rounded-md px-3 py-2 text-[12px] placeholder:text-[#a7f3d0] focus:outline-none focus:ring-1 focus:ring-[#a7f3d0]"
                 required>
        </div>
      </div>

      {{-- Referencias --}}
      <div>
        <label for="referencias" class="block text-[11px] font-normal mb-1">Referencia (opcional)</label>
        <textarea name="referencias" rows="2"
                  class="w-full border border-[#a7f3d0] rounded-md px-3 py-2 text-[12px] placeholder:text-[#a7f3d0] resize-y focus:outline-none focus:ring-1 focus:ring-[#a7f3d0]"
                  placeholder="Casa color verde, portón negro, al costado de la farmacia...">{{ old('referencias') }}</textarea>
      </div>
    </section>

    <!-- Método de Pago -->
    <section class="space-y-2">
      <h2 class="flex items-center text-[#065f46] font-semibold text-[15px]">
        <i class="fas fa-receipt mr-2 text-[15px]"></i>
        Método de Pago
      </h2>
      <p class="text-[11px] text-[#065f46] -mt-1 mb-2">
        Selecciona cómo quieres pagar tu pedido
      </p>

      <div class="space-y-2 text-[11px]">
        <div>
          <input type="radio" id="tarjeta" name="metodo_pago" value="tarjeta" class="mr-2 align-middle" required>
          <label for="tarjeta">Tarjeta</label>
        </div>
        <div>
          <input type="radio" id="transferencia" name="metodo_pago" value="transferencia" class="mr-2 align-middle">
          <label for="transferencia">Transferencia</label>
        </div>
        <div>
          <input type="radio" id="efectivo" name="metodo_pago" value="efectivo" class="mr-2 align-middle">
          <label for="efectivo">Pago contra entrega (efectivo)</label>
        </div>
      </div>
    </section>

    <!-- Botones -->
    <div class="mt-6 flex justify-between items-center">
      <button type="button" id="volver-carrito" class="text-[#065f46] hover:underline text-[13px]">
        ← Volver al carrito
      </button>
      <button type="submit"
              class="bg-[#065f46] hover:bg-[#064e3b] text-white font-semibold rounded-md px-6 py-2 transition text-[13px]">
        Confirmar Pedido →
      </button>
    </div>
  </form>
</div>
