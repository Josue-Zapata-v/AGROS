<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGROS - Agricultor</title>
    <!-- Font Awesome (íconos) -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
     <!-- Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet" />
<!-- Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    
    @stack('styles')

</head>
<body class="bg-[#f4fdef] text-[#1b462b] min-h-screen">
    {{-- Header superior --}}
    <header class="flex justify-between items-center border-b border-[#a6d6a1] bg-[#fefefe] px-6 py-2 shadow-sm">
        <div class="flex items-center space-x-2">
            {{-- Logo desde URL --}}
        <a href="{{ route('agricultor.dashboard') }}">

            <img src="https://www.dropbox.com/scl/fi/1x7gbiqskthx5flkd6bcj/logo-2-1.png?rlkey=m7zlwuggwupa0208r2tfjz2gi&st=a7fo2t40&dl=1" class="h-10 w-auto" alt="Logo AGROS" >
        </a>    
        </div>
        <div class="flex items-center gap-4">
            @if (Auth:: check())
            <span class="select-text">Bienvenido, {{ Auth::user()->name }}</span>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="border border-[#1b462b] rounded-md px-4 py-2 text-[#1b462b] hover:bg-[#e6f3e6] transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </header>
    {{-- Layout principal --}}
    <main class="flex flex-col md:flex-row max-w-7xl mx-auto mt-6 px-4 md:px-6 gap-6">
        {{-- Sidebar lateral --}}
        {{-- Sidebar lateral (condicional) --}}
        @if (!isset($ocultarSidebar) || !$ocultarSidebar)
        <nav class="bg-white border border-[#a6d6a1] rounded-lg w-full max-w-xs select-none">
            <h2 class="font-semibold text-lg px-6 py-4 border-b border-[#a6d6a1] rounded-t-lg">Panel de Control</h2>
            <ul class="text-[#1b462b]">
                <li>
                    <a href="{{ route('agricultor.dashboard') }}" class="flex items-center gap-2 px-6 py-3 hover:bg-[#e6f3e6] font-medium">
                        🧺 Mis productos
                    </a>
                </li>
                <li>
                    <a href="{{ route('agricultor.pedidos') }}" class="flex items-center gap-2 px-6 py-3 hover:bg-[#e6f3e6] font-medium">
                        📦 Pedidos recibidos
                    </a>
                </li>
                <li>
                    <a href="{{ route('agricultor.postulaciones') }}" class="flex items-center gap-2 px-6 py-3 hover:bg-[#e6f3e6] font-medium">
                        🚚 Postulaciones de transportistas
                    </a>
                </li>
                <li>
                    <a href="{{ route('agricultor.perfil') }}" class="flex items-center gap-2 px-6 py-3 hover:bg-[#e6f3e6] font-medium">
                        👤 Mi perfil
                    </a>
                </li>
            </ul>
        </nav>
        @endif
        
        
        {{-- Contenido principal dinámico --}}
        <section class="flex-1 space-y-4">
            {{-- Alerta de error --}}
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Atención! </strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            
            <section class="flex-1 space-y-4 relative">
                {{-- Mostrar mensaje de perfil incompleto si aplica --}}
                @php
                    $usuario = Auth::user();
                    $perfilIncompleto = $usuario && (
                        empty($usuario->departamento) ||
                        empty($usuario->provincia) ||
                        empty($usuario->distrito) ||
                        empty($usuario->direccion_detallada)
                    );
                @endphp

                @if ($perfilIncompleto && !request()->routeIs('agricultor.perfil'))
                    {{-- Tarjeta amable de advertencia (NO modal) --}}
                    <div class="flex items-start gap-4 bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-md shadow-sm z-50 relative">
                        <div class="bg-green-50 border border-green-200 text-green-900 rounded-xl p-5 shadow-sm">
                            <div class="flex items-start space-x-3">
                                <!-- Ícono de información -->
                                <div class="flex-shrink-0 mt-1 text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                    </svg>
                                </div>
                                <!-- Contenido del mensaje -->
                                <div>
                                    <h2 class="text-base font-semibold">Información de perfil incompleta</h2>
                                    <p class="text-sm mt-1">
                                        Antes de continuar usando la plataforma, por favor completa tu información de dirección.
                                    </p>
                                    <a href="{{ route('agricultor.perfil') }}?abrir_modal=1"
                                        class="inline-block mt-3 bg-[#1b462b] hover:bg-[#163a22] text-white px-4 py-2 rounded-md font-medium text-sm transition duration-150">
                                            Completar perfil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Capa de bloqueo para el contenido y sidebar --}}
                    <div class="absolute inset-0 bg-white bg-opacity-70 z-40 pointer-events-auto"></div>
                @endif

                {{-- Contenido principal --}}
                @yield('content')
            </section>

        </section>
        
    </main>
    @stack('scripts')
    <script>
    function mostrarNombreArchivo() {
        const input = document.getElementById('imagen');
        const nombreArchivo = document.getElementById('nombre-archivo');

        if (input.files.length > 0) {
            nombreArchivo.textContent = '🖼 Imagen seleccionada: ' + input.files[0].name;
        } else {
            nombreArchivo.textContent = '';
        }
    }
</script>


</body>
</html>
