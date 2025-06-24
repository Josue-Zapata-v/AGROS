@extends('layouts.agricultor', ['ocultarSidebar' => true])

@section('content')
<div class="bg-[#f2fef9] min-h-screen flex justify-center py-10 px-4">
  <main class="max-w-3xl w-full space-y-6">
    <!-- Header -->
    <a href="{{ route('agricultor.dashboard') }}" class="text-[#1B6B3A] text-sm flex items-center mb-4 hover:underline">
        <i class="fas fa-arrow-left mr-1"></i> Volver al inicio
    </a>
    <div class="flex flex-col items-center mb-4">
      <div class="bg-[#2f9e44] rounded-full p-3 mb-2">
        <i class="fas fa-seedling text-white text-xl"></i>
      </div>
      <h1 class="text-center font-semibold text-base text-[#212529]">Agregar Nuevo Producto</h1>
      <p class="text-center text-sm text-[#495057] mt-1">
        Completa la información para publicar tu producto y llegar a más compradores
      </p>
    </div>

    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Información Básica -->
      <section class="border border-[#ced4da] rounded-md p-4 bg-white">
        <div class="flex items-center mb-2 text-[#2f9e44] font-semibold text-base">
          <i class="fas fa-seedling mr-2"></i>Información Básica
        </div>
        <p class="text-xs text-[#6c757d] mb-4">Datos principales de tu producto</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
          <label class="text-xs text-[#495057] flex flex-col">
            <span class="mb-1 font-semibold">Nombre del Producto</span>
            <input
              type="text"
              name="nombre"
              value="{{ old('nombre') }}"
              placeholder="Ej: Tomates orgánicos"
              class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
            />
            @error('nombre')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
          </label>
          <label class="text-xs text-[#495057] flex flex-col">
            <span class="mb-1 font-semibold">Ubicación</span>
            <input
              type="text"
              name="ubicacion"
              value="{{ old('ubicacion') }}"
              placeholder="Ej: Lima, Perú"
              class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
            />
            @error('ubicacion')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
          </label>
        </div>

        <label class="text-xs text-[#495057] flex flex-col">
          <span class="mb-1 font-semibold">Descripción</span>
          <textarea
            name="descripcion"
            rows="3"
            placeholder="Describe tu producto, métodos de cultivo, beneficios..."
            class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] resize-y focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
          >{{ old('descripcion') }}</textarea>
          @error('descripcion')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </label>
      </section>

      <!-- Precio y Disponibilidad -->
      <section class="border border-[#ced4da] rounded-md p-4 bg-white">
        <div class="flex items-center mb-2 text-[#2f9e44] font-semibold text-base">
          <i class="fas fa-dollar-sign mr-2"></i>Precio y Disponibilidad
        </div>
        <p class="text-xs text-[#6c757d] mb-4">Configura el precio y stock disponible</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <label class="text-xs text-[#495057] flex flex-col">
            <span class="mb-1 font-semibold text-[#2f9e44] flex items-center gap-1">
              <i class="fas fa-dollar-sign"></i> Precio por kg (S/)
            </span>
            <input
              type="number"
              step="0.01"
              min="0"
              name="precio"
              value="{{ old('precio', '0.00') }}"
              class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
            />
            @error('precio')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
          </label>
          <label class="text-xs text-[#495057] flex flex-col">
            <span class="mb-1 font-semibold text-[#2f9e44] flex items-center gap-1">
              <i class="fas fa-boxes"></i> Stock disponible (kg)
            </span>
            <input
              type="number"
              min="0"
              name="stock"
              value="{{ old('stock', '0') }}"
              class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
            />
            @error('stock')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
          </label>
        </div>
      </section>

      <!-- Configuración de Envío -->
      <section class="border border-[#ced4da] rounded-md p-4 bg-white">
        <div class="flex items-center mb-2 text-[#2f9e44] font-semibold text-base">
          <i class="fas fa-shipping-fast mr-2"></i>Configuración de Envío
        </div>
        <p class="text-xs text-[#6c757d] mb-4">Define los límites de cantidad por pedido</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <label class="text-xs text-[#495057] flex flex-col">
            <span class="mb-1 font-semibold">Cantidad mínima por pedido (kg)</span>
            <input
              type="number"
              min="1"
              name="min_kg_envio"
              value="{{ old('min_kg_envio', '1') }}"
              class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
            />
            @error('min_kg_envio')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
          </label>
          <label class="text-xs text-[#495057] flex flex-col">
            <span class="mb-1 font-semibold">Cantidad máxima por pedido (kg)</span>
            <input
              type="number"
              min="1"
              name="max_kg_envio"
              value="{{ old('max_kg_envio', '100') }}"
              class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
            />
            @error('max_kg_envio')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
          </label>
        </div>
      </section>

      <!-- Detalles Adicionales -->
      <section class="border border-[#ced4da] rounded-md p-4 bg-white">
        <div class="flex items-center mb-2 text-[#2f9e44] font-semibold text-base">
          <i class="fas fa-star mr-2"></i>Detalles Adicionales
        </div>
        <p class="text-xs text-[#6c757d] mb-4">Características especiales y categorización</p>

        <label class="text-xs text-[#495057] flex flex-col mb-4">
          <span class="mb-1 font-semibold">Características Especiales</span>
          <textarea
            name="caracteristicas"
            rows="3"
            placeholder="Ej: Orgánico, sin pesticidas, cosecha reciente..."
            class="border border-[#ced4da] rounded px-2 py-1 text-xs text-[#495057] resize-y focus:outline-none focus:ring-1 focus:ring-[#2f9e44]"
          >{{ old('caracteristicas') }}</textarea>
          @error('caracteristicas')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </label>
        <!-- Categorías (Menú Desplegable Mejorado) -->
        <label class="text-xs text-[#495057] flex flex-col mb-2">
            <span class="mb-1 font-semibold">Categorías</span>
            <select
                id="select-categorias"
                name="categorias[]"
                multiple
                placeholder="Selecciona categorías..."
            >
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ collect(old('categorias'))->contains($categoria->id) ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categorias')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </label>
        
      </section>
      <!-- Estilos y Script para Tom Select -->
       @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet" />
       @endpush

       @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new TomSelect('#select-categorias', {
                    plugins: ['remove_button'],
                    maxItems: null,
                    persist: false,
                    create: false
                });
            });
        </script>
        @endpush

      {{-- 🖼 Imagen del producto --}}
      <section class="border border-[#ced4da] rounded-md p-4 bg-white">
        <div class="flex items-center mb-2 text-[#2f9e44] font-semibold text-base">
            <i class="fas fa-upload mr-2"></i> Imagen del Producto
        </div>
        <p class="text-xs text-[#6c757d] mb-4">Sube una foto atractiva de tu producto</p>

        <label
            class="flex flex-col items-center justify-center border border-dashed border-[#ced4da] rounded-md cursor-pointer py-10 text-center text-xs text-[#6c757d] hover:bg-[#e9f7ef] transition-colors"
        >
            <i class="fas fa-cloud-upload-alt text-2xl mb-2"></i>
            <span>Click para subir o arrastra y suelta</span>
            <span class="mt-1 font-semibold">PNG, JPG o JPEG (MAX 5MB)</span>
            <input 
                id="imagen"
                type="file" 
                name="imagen" 
                accept=".png,.jpg,.jpeg" 
                class="hidden"
                onchange="mostrarNombreArchivo()" 
            />

        </label>
        <p id="nombre-archivo" class="mt-2 text-sm text-green-700 text-center"></p>

        @error('imagen')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </section>
      <!-- Botones -->
      <div class="flex justify-between mt-6">
        <a
          href="{{ route('agricultor.dashboard') }}"
          class="border border-[#ced4da] rounded px-4 py-2 text-xs text-[#495057] hover:bg-[#e9ecef] transition-colors flex items-center gap-2"
        >
          <i class="fas fa-times"></i> Cancelar
        </a>
        <button
          type="submit"
          class="bg-[#2f9e44] text-white rounded px-4 py-2 text-xs flex items-center gap-2 hover:bg-[#248636] transition-colors"
        >
          <i class="fas fa-check"></i> Guardar Producto
        </button>
      </div>
    </form>
  </main>
</div>
@endsection
