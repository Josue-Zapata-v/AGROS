<div class="w-full max-w-4xl mx-auto mb-10 px-4">
  <nav aria-label="Progress" class="w-full mb-10">
    <ol id="paso-header" class="grid grid-cols-5 items-center text-center gap-2">

      {{-- Paso 1 (activo al inicio) --}}
      <li class="flex flex-col items-center col-span-1">
        <div id="paso-1-circle" class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-green-600 text-white shadow-md">1</div>
        <span id="paso-1-text" class="mt-2 text-sm font-semibold text-[#0B5C2E]">Carrito</span>
      </li>

      {{-- Barra 1 → 2 (inactiva al inicio) --}}
      <li id="barra-1-2" class="h-1 col-span-1 bg-[#0B5C2E]/30"></li>

      {{-- Paso 2 (inactivo al inicio) --}}
      <li class="flex flex-col items-center col-span-1">
        <div id="paso-2-circle" class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-gray-200 text-gray-500">2</div>
        <span id="paso-2-text" class="mt-2 text-sm font-medium text-gray-500">Entrega</span>
      </li>

      {{-- Barra 2 → 3 (inactiva al inicio) --}}
      <li id="barra-2-3" class="h-1 col-span-1 bg-[#0B5C2E]/30"></li>

      {{-- Paso 3 (inactivo al inicio) --}}
      <li class="flex flex-col items-center col-span-1">
        <div id="paso-3-circle" class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-gray-200 text-gray-500">3</div>
        <span id="paso-3-text" class="mt-2 text-sm font-medium text-gray-500">Confirmación</span>
      </li>

    </ol>
  </nav>
</div>
