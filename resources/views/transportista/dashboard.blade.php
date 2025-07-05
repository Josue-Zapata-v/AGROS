@extends('layouts.transportista')

@section('content')
<div class="space-y-6">

    {{-- Tarjeta de bienvenida destacada --}}
    <div class="bg-gradient-to-r from-green-100 to-green-200 p-6 rounded-xl shadow-lg flex flex-col sm:flex-row justify-between items-center">
        <div>
            <h1 class="text-3xl sm:text-4xl font-bold text-green-900 mb-2">
                ¡Hola {{ $usuario->name }}! 👋
            </h1>
            <p class="text-green-800 text-lg max-w-xl">
                Bienvenido a tu panel de <strong>Transportista</strong>. Aquí podrás gestionar tus entregas, postularte a pedidos y hacer posible que productos frescos lleguen a más hogares peruanos.
            </p>
        </div>
        <img src="https://cdn-icons-png.flaticon.com/512/1995/1995472.png" alt="Camión delivery" class="h-24 sm:h-32 mt-4 sm:mt-0">
    </div>

    {{-- Sección de resumen visual --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white border border-green-200 p-6 rounded-lg shadow hover:shadow-md transition transform hover:-translate-y-1">
            <div class="text-4xl mb-2 text-green-600">📦</div>
            <h2 class="text-lg font-semibold text-green-900">Pedidos disponibles</h2>
            <p class="text-3xl font-bold text-green-700 mt-2">--</p>
            <p class="text-sm text-gray-500 mt-1">Postúlate si el precio por kg te conviene</p>
        </div>
        <div class="bg-white border border-green-200 p-6 rounded-lg shadow hover:shadow-md transition transform hover:-translate-y-1">
            <div class="text-4xl mb-2 text-green-600">📝</div>
            <h2 class="text-lg font-semibold text-green-900">Mis postulaciones</h2>
            <p class="text-3xl font-bold text-green-700 mt-2">--</p>
            <p class="text-sm text-gray-500 mt-1">Revisa si fuiste aceptado o rechazado</p>
        </div>
        <div class="bg-white border border-green-200 p-6 rounded-lg shadow hover:shadow-md transition transform hover:-translate-y-1">
            <div class="text-4xl mb-2 text-green-600">🚚</div>
            <h2 class="text-lg font-semibold text-green-900">Transportes activos</h2>
            <p class="text-3xl font-bold text-green-700 mt-2">--</p>
            <p class="text-sm text-gray-500 mt-1">Marca cuando entregues los productos</p>
        </div>
    </div>

    {{-- Frase inspiradora final opcional --}}
    <div class="text-center mt-8 text-green-700 text-sm italic">
        “Gracias por contribuir al crecimiento del agro en el Perú 🇵🇪”
    </div>

</div>
@endsection
