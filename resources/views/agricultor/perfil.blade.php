@extends('layouts.agricultor')

@section('content')
<h1 class="text-2xl font-bold mb-4">👤 Mi perfil</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow rounded-lg p-6 max-w-md">
    <div class="mb-4">
        <p class="text-gray-700 font-semibold">Nombre:</p>
        <p class="text-lg">{{ $usuario->name }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-700 font-semibold">Teléfono:</p>
        <p class="text-lg">{{ $usuario->phone ?? 'No registrado' }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-700 font-semibold">Dirección completa:</p>
        <p class="text-lg">
            {{ $usuario->departamento }}, {{ $usuario->provincia }}, {{ $usuario->distrito }}<br>
            {{ $usuario->direccion_detallada }}
        </p>
    </div>

    <div class="mt-6 text-right">
        <button 
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
            onclick="document.getElementById('modal-editar-perfil').classList.remove('hidden')"
        >
            Editar perfil
        </button>
    </div>
</div>

<!-- Modal de edición -->
<div id="modal-editar-perfil" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
        <h2 class="text-xl font-semibold mb-4">Editar perfil</h2>

        <form method="POST" action="{{ route('agricultor.perfil.update') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $usuario->name) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Teléfono</label>
                <input type="text" name="phone" value="{{ old('phone', $usuario->phone) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Departamento</label>
                <input type="text" name="departamento" value="{{ old('departamento', $usuario->departamento) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('departamento')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Provincia</label>
                <input type="text" name="provincia" value="{{ old('provincia', $usuario->provincia) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('provincia')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Distrito</label>
                <input type="text" name="distrito" value="{{ old('distrito', $usuario->distrito) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('distrito')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Dirección detallada</label>
                <input type="text" name="direccion_detallada" value="{{ old('direccion_detallada', $usuario->direccion_detallada) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('direccion_detallada')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
                    Guardar cambios
                </button>
            </div>
        </form>

        <!-- Botón de cerrar en la esquina -->
        <button 
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl"
            onclick="document.getElementById('modal-editar-perfil').classList.add('hidden')"
        >
            &times;
        </button>
    </div>
</div>
@endsection
