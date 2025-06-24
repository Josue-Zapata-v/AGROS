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
            @yield('content')
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
