<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Catálogo - AGROS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>
<body class="flex flex-col min-h-screen overflow-y-auto">

    <div class="fixed inset-0 opacity-10 -z-10 pointer-events-none">
        <div class="absolute top-20 left-10 w-32 h-32 bg-green-300 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-emerald-300 rounded-full blur-2xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-teal-300 rounded-full blur-3xl animate-pulse delay-2000"></div>
    </div>
    
    
    <x-header-publico/>

    {{-- CONTENIDO --}}
    <main class="pt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Mensaje de bienvenida --}}
        @yield('content')
    </main  >

    {{-- FOOTER --}}    
    <x-footer-publico />
    
    @stack('scripts')

</body>
</html>
