<header class="fixed top-0 inset-x-0 z-50 bg-white border-b border-green-300 shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <div class="flex items-center space-x-2">
                <a href="/">
                    <img src="https://www.dropbox.com/scl/fi/1x7gbiqskthx5flkd6bcj/logo-2-1.png?rlkey=m7zlwuggwupa0208r2tfjz2gi&st=a7fo2t40&dl=1"
                         alt="Logo AGROS" class="h-10 w-auto">
                </a>
            </div>

            {{-- Botón menú hamburguesa (móvil) --}}
            <div class="md:hidden">
                <button id="mobileMenuToggle" class="text-green-800 text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            {{-- Navegación Escritorio --}}              
            @php
                $carrito = session('carrito', []);
                $totalCarrito = array_sum(array_column($carrito, 'cantidad'));
            @endphp

            <div class="hidden md:flex items-center space-x-10 text-green-800 font-medium text-base">
                <a href="/" class="hover:underline">Inicio</a>
                <a href="/productos-publicos" class="hover:underline">Productos</a>
                @auth
                    @if(Auth::user()->role === 'comprador')
                        <a href="{{ route('comprador.pedidos') }}" class="hover:underline">Mis Pedidos</a>
                    @endif
                    @endauth
                <a href="#" class="hover:underline">Mi Perfil</a>
                @include('components.icono-carrito')
            </div>

        

            {{-- Acciones (login/registro o usuario logeado) --}}
            <div class="hidden md:flex items-center space-x-6 text-green-800 font-medium text-base">
                @guest
                    <a href="{{ route('auth.unificado') }}" class="hover:underline">Iniciar sesión</a>
                    <a href="{{ route('auth.unificado') }}" class="bg-green-700 hover:bg-green-800 text-white font-semibold px-4 py-2 rounded-md select-none">
                        Registrarse
                    </a>
                @else
                    <span>Hola, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="border border-green-800 rounded px-3 py-1 text-green-800 hover:bg-green-800 hover:text-white transition-colors">
                            <i class="fas fa-sign-out-alt mr-1"></i> Salir
                        </button>
                    </form>
                @endguest
            </div>
        </div>

        {{-- Navegación Móvil --}}
        <div id="mobileMenu" class="md:hidden hidden mt-4 pb-4 border-t border-green-200">
            <div class="flex flex-col space-y-3 text-green-800 font-medium text-base">
                <a href="/" class="hover:underline">Inicio</a>
                <a href="/productos-publicos" class="hover:underline">Productos</a>
                <a href="#" class="hover:underline">Mis Pedidos</a>
                <a href="#" class="hover:underline">Mi Perfil</a>
                @include('components.icono-carrito')

                @guest
                    <a href="{{ route('auth.unificado') }}" class="hover:underline">Iniciar sesión</a>
                    <a href="{{ route('auth.unificado') }}" class="bg-green-700 hover:bg-green-800 text-white font-semibold px-4 py-2 rounded-md select-none w-fit">
                        Registrarse
                    </a>
                @else
                    <div class="flex flex-col gap-2">
                        <span>Hola, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="border border-green-800 rounded px-3 py-1 text-green-800 hover:bg-green-800 hover:text-white transition-colors w-fit">
                                <i class="fas fa-sign-out-alt mr-1"></i> Salir
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    {{-- Script para alternar menú móvil --}}
    <script>
        document.getElementById('mobileMenuToggle').addEventListener('click', function () {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });
    </script>
</header>  
