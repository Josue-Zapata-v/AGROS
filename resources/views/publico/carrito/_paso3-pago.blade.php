<div id="step-3" class="hidden w-full max-w-4xl mx-auto mb-10 px-4">
  <div class="bg-white rounded-2xl p-6 shadow-md">
    <h2 class="text-2xl font-bold text-[#0B5C2E] mb-4 text-center">💳 Confirmar Pago</h2>

    <p class="mb-6 text-gray-700 text-center">
      Ya casi terminamos. Verifica cuidadosamente los datos de entrega y elige un método de pago.
    </p>

    <form action="{{ route('carrito.pago.procesar') }}" method="POST" class="space-y-6">
      @csrf

      <input type="hidden" name="pedido_id" value="{{ session('ultimo_pedido_id') }}">

      

      <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block mb-2 font-semibold text-gray-700">Selecciona método de pago:</label>
        <div class="flex flex-col md:flex-row gap-4">
          <label class="flex items-center gap-2">
            <input type="radio" name="metodo_pago" value="tarjeta" required>
            <span class="text-sm text-gray-700">Tarjeta</span>
          </label>
          <label class="flex items-center gap-2">
            <input type="radio" name="metodo_pago" value="transferencia">
            <span class="text-sm text-gray-700">Transferencia</span>
          </label>
          <label class="flex items-center gap-2">
            <input type="radio" name="metodo_pago" value="efectivo">
            <span class="text-sm text-gray-700">Pago en efectivo</span>
          </label>
        </div>
      </div>

      <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-4 border-t">
        <button type="button"
                id="volver-entrega"
                class="w-full md:w-auto text-[#0B5C2E] border border-[#0B5C2E] hover:bg-[#0B5C2E]/10 font-semibold rounded-md px-6 py-2 transition">
          ← Volver a Entrega
        </button>

        <button type="submit"
                class="w-full md:w-auto bg-[#0B5C2E] hover:bg-[#084e28] text-white font-semibold rounded-md px-6 py-2 transition">
          Confirmar Pedido
        </button>
      </div>
    </form>
  </div>
</div>
