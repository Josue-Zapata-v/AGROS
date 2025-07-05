<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGROS - Transportista</title>
    
    <!-- Font Awesome -->
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
            <a href="{{ route('transportista.dashboard') }}">
                <img src="https://www.dropbox.com/scl/fi/1x7gbiqskthx5flkd6bcj/logo-2-1.png?rlkey=m7zlwuggwupa0208r2tfjz2gi&st=a7fo2t40&dl=1" class="h-10 w-auto" alt="Logo AGROS">
            </a>    
        </div>
        <div class="flex items-center gap-4">
            @if (Auth::check())
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
        @if (!isset($ocultarSidebar) || !$ocultarSidebar)
        <nav class="bg-white border border-[#a6d6a1] rounded-lg w-full max-w-xs select-none">
            <h2 class="font-semibold text-lg px-6 py-4 border-b border-[#a6d6a1] rounded-t-lg">Panel de Control</h2>
            <ul class="text-[#1b462b]">
                <li>
                    <a href="{{ route('transportista.pedidos.disponibles') }}" class="flex items-center gap-2 px-6 py-3 hover:bg-[#e6f3e6] font-medium">
                        📦 Pedidos disponibles
                    </a>
                </li>
                <li>
                    <a href="{{  route('transportista.postulaciones') }}" class="flex items-center gap-2 px-6 py-3 hover:bg-[#e6f3e6] font-medium">
                        📝 Mis postulaciones
                    </a>
                </li>
                <li>
                    <a href="{{ route('transportista.transportes') }}" class="flex items-center gap-2 px-6 py-3 hover:bg-[#e6f3e6] font-medium">
                        🚚 Transportes asignados
                    </a>
                </li>
            </ul>
        </nav>
        @endif

        {{-- Contenido principal dinámico --}}
        <section class="flex-1 space-y-4">
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Atención! </strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </section>

    </main>

    @stack('scripts')

</body>
</html>
