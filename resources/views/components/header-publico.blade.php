
    {{-- HEADER --}}
    <header class="bg-white border-b border-green-300">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <a href="/">
                        <img src="https://www.dropbox.com/scl/fi/1x7gbiqskthx5flkd6bcj/logo-2-1.png?rlkey=m7zlwuggwupa0208r2tfjz2gi&st=a7fo2t40&dl=1" alt="Logo AGROS" class="h-10 w-auto">
                    </a>
                </div>
                <div class="hidden md:flex space-x-10 text-green-800 font-medium text-base">
                    <a href="/" class="hover:underline">Inicio</a>
                    <a href="#" class="hover:underline">Quiénes somos</a>
                    <a href="productos-publicos" class="hover:underline">Productos</a>

                </div>
                <div class="hidden md:flex items-center space-x-6 text-green-800 font-medium text-base">
                    <a href="{{ route('auth.unificado') }}" class="hover:underline">Iniciar sesión</a>
                    <a href="{{ route('auth.unificado') }}" class="bg-green-700 hover:bg-green-800 text-white font-semibold px-4 py-2 rounded-md select-none">
                        Registrarse
                    </a>
                </div>
            </div>
        </nav>
    </header>