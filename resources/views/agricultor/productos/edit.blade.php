@extends('layouts.agricultor', ['ocultarSidebar' => true])

@section('content')
    <h2 class="text-2xl font-bold text-[#1b462b] mb-4">🌿 Editar producto</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 rounded text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data"
          class="space-y-6 max-w-3xl bg-white p-6 rounded-lg shadow-md mx-auto">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}"
                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        {{-- Descripción --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">Descripción</label>
            <textarea name="descripcion" rows="3"
                      class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        {{-- Precio y Stock --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700">Precio (S/)</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}"
                       class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700">Stock (kg)</label>
                <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}"
                       class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
        </div>

        {{-- Imagen actual --}}
        @if ($producto->imagen)
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Imagen actual:</label>
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen actual" class="h-32 rounded border border-gray-200">
            </div>
        @endif

        {{-- Nueva imagen --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">Cambiar imagen</label>
            <input type="file" name="imagen" accept="image/*"
                   class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-green-100 file:text-green-700 hover:file:bg-green-200">
        </div>

        {{-- Características --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">Características</label>
            <textarea name="caracteristicas" rows="2"
                      class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('caracteristicas', $producto->caracteristicas) }}</textarea>
        </div>

        {{-- Ubicación --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">Ubicación</label>
            <input type="text" name="ubicacion" value="{{ old('ubicacion', $producto->ubicacion) }}"
                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        {{-- Min y Max kg --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700">Mínimo kg por envío</label>
                <input type="number" name="min_kg_envio" value="{{ old('min_kg_envio', $producto->min_kg_envio) }}"
                       class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700">Máximo kg por envío</label>
                <input type="number" name="max_kg_envio" value="{{ old('max_kg_envio', $producto->max_kg_envio) }}"
                       class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
        </div>

        {{-- Botones --}}
        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('agricultor.dashboard') }}"
               class="px-5 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                Cancelar
            </a>
            <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                💾 Actualizar producto
            </button>
        </div>
    </form>
@endsection
