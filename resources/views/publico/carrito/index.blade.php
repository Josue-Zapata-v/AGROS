@extends('layouts.publico')
@section('title', 'Carrito de Compras')

@section('content')
  <div class="max-w-7xl mx-auto px-4 lg:px-0 mt-12">

    <div class="max-w-7xl mx-auto px-4 lg:px-0">
      <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 via-lime-500 to-green-600 bg-clip-text text-transparent text-left mb-10">
        Tu Carrito
      </h1>

      {{-- 1) Header de pasos (siempre visible) --}}
      @include('publico.carrito._pasos-header', ['pasoActivo' => 1])

      {{-- 2) Paso 1: carrito (visible al inicio) --}}
      @include('publico.carrito._paso1-carrito')

      {{-- 3) Paso 2: entrega (oculto inicialmente) --}}
      @include('publico.carrito._paso2-entrega')
    </div>
    
  </div>
@endsection

@push('scripts')
  @include('publico.carrito._scripts')
@endpush
