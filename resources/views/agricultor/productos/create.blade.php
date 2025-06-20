@extends('layouts.agricultor', ['ocultarSidebar' => true])

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-3 mb-6">
            <span class="text-3xl">🌱</span>
            <h2 class="text-3xl font-extrabold text-[#1b462b] tracking-tight">Agregar nuevo producto</h2>
        </div>

        <div class="bg-white rounded-xl shadow-md p-8 border border-[#c4e2c0]">
            <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- 📝 Datos principales --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-[#1b462b]">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b462b]">Ubicación</label>
                        <input type="text" name="ubicacion" value="{{ old('ubicacion') }}"
                            class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">
                        @error('ubicacion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#1b462b]">Descripción</label>
                    <textarea name="descripcion" rows="3"
                        class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 🛒 Precios y cantidades --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-[#1b462b]">Precio (S/)</label>
                        <input type="number" step="0.01" name="precio" value="{{ old('precio') }}"
                            class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">
                        @error('precio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b462b]">Stock (kg)</label>
                        <input type="number" name="stock" value="{{ old('stock') }}"
                            class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">
                        @error('stock')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- 🔍 Características --}}
                <div>
                    <label class="block text-sm font-medium text-[#1b462b]">Características</label>
                    <textarea name="caracteristicas" rows="2"
                        class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('caracteristicas') }}</textarea>
                    @error('caracteristicas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 📦 Configuración de envíos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-[#1b462b]">Mínimo kg por envío</label>
                        <input type="number" name="min_kg_envio" value="{{ old('min_kg_envio') }}"
                            class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">
                        @error('min_kg_envio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b462b]">Máximo kg por envío</label>
                        <input type="number" name="max_kg_envio" value="{{ old('max_kg_envio') }}"
                            class="mt-1 w-full rounded-md border border-green-300 bg-green-50 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500">
                        @error('max_kg_envio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- 🖼 Imagen --}}
                <div>
                    <label class="block text-sm font-medium text-[#1b462b]">Imagen del producto</label>
                    <input type="file" name="imagen" accept="image/*"
                        class="mt-1 w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-green-100 file:text-green-700 hover:file:bg-green-200">
                </div>

                {{-- ✅ Botones --}}
                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('agricultor.dashboard') }}"
                        class="inline-block px-5 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-block px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
                        💾 Guardar producto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
