<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo - AGROS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">

    {{-- HEADER PERSONALIZADO --}}
    <header class="bg-white border-b border-green-300 shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                {{-- Logo --}}
                <div class="flex items-center space-x-3">
                    <img src="https://www.dropbox.com/scl/fi/1x7gbiqskthx5flkd6bcj/logo-2-1.png?rlkey=m7zlwuggwupa0208r2tfjz2gi&st=a7fo2t40&dl=1" 
                         alt="Logo AGROS" class="h-10 w-auto">
                </div>

                {{-- Navegación principal --}}
                <div class="hidden md:flex items-center space-x-8 text-green-800 font-medium text-base">
                    <a href="/" class="hover:underline hover:text-green-900 transition">Inicio</a>
                    <a href="{{ route('productos.publicos') }}" class="hover:underline hover:text-green-900 transition">Productos</a>
                </div>

                {{-- Botones de sesión --}}
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('auth.unificado') }}" class="text-green-800 font-medium hover:underline">Iniciar sesión</a>
                    <a href="{{ route('auth.unificado') }}" class="bg-green-700 hover:bg-green-800 text-white font-semibold px-4 py-2 rounded-md transition">
                        Registrarse
                    </a>
                </div>
            </div>
        </nav>
    </header>

    {{-- CONTENIDO --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <x-footer-publico />

</body>
</html>
