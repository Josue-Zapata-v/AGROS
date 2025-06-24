<header class="flex justify-between items-center border-b border-[#a6d6a1] bg-[#fefefe] px-6 py-2 shadow-sm">
    <div class="flex items-center space-x-2">
        <a href="{{ route(Auth::user()->rol . '.dashboard') }}">
            <img src="https://www.dropbox.com/scl/fi/1x7gbiqskthx5flkd6bcj/logo-2-1.png?rlkey=m7zlwuggwupa0208r2tfjz2gi&st=a7fo2t40&dl=1"
                 class="h-10 w-auto" alt="Logo AGROS">
        </a>
    </div>

    <div class="flex items-center gap-4">
        <span class="select-text text-sm">Bienvenido, {{ Auth::user()->name }}</span>

        {{-- Botones extra por rol --}}
        @if (Auth::user()->rol === 'comprador')
            <a href="{{ route('carrito.index') }}" class="text-sm text-green-700 hover:underline">
                🛒 Mi Carrito
            </a>
        @elseif (Auth::user()->rol === 'transportista')
            <a href="{{ route('postulaciones.index') }}" class="text-sm text-green-700 hover:underline">
                🚚 Postulaciones
            </a>
        @endif

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="border border-[#1b462b] rounded-md px-4 py-2 text-[#1b462b] hover:bg-[#e6f3e6] transition text-sm">
                Cerrar sesión
            </button>
        </form>
    </div>
</header>
