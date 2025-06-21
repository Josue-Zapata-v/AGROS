<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AGROS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-[#0f4a2f] flex flex-col min-h-screen">

    {{-- HEADER --}}
    <header class="bg-white border-b border-green-300">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <img src="https://www.dropbox.com/scl/fi/1x7gbiqskthx5flkd6bcj/logo-2-1.png?rlkey=m7zlwuggwupa0208r2tfjz2gi&st=a7fo2t40&dl=1" alt="Logo AGROS" class="h-10 w-auto">
                </div>
                <div class="hidden md:flex space-x-10 text-green-800 font-medium text-base">
                    <a href="#" class="hover:underline">Inicio</a>
                    <a href="#" class="hover:underline">Quiénes somos</a>
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
    {{-- SECCIÓN 1: HERO con fondo imagen --}}
    <section class="relative bg-cover bg-center bg-no-repeat min-h-[85vh] flex items-center justify-center text-center px-4"
    style="background-image: url('https://www.up.edu.pe/prensa/noticiasold/PublishingImages/dia%20nacional%20del%20campesino%20detalle.jpg');">
    {{-- Capa oscura transparente sobre la imagen --}}
    <div class="absolute inset-0 bg-black opacity-50 z-0"></div>
    {{-- Contenido principal --}}
    <div class="relative z-10 bg-white bg-opacity-80 p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-green-900 mb-4">
            Del Campo a Tu Mesa
        </h1>
        <p class="text-lg sm:text-xl mb-6 text-green-900">
            Conectamos agricultores de zonas rurales con compradores en todo el país. <br class="hidden sm:block" />
            Productos frescos, directos del productor.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('auth.unificado') }}"
               class="inline-flex items-center justify-center gap-2 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-md px-6 py-3">
                <i class="fas fa-leaf"></i>
                Registrarse como Agricultor
            </a>
            <a href="{{ route('productos.publicos') }}"
               class="inline-flex items-center justify-center gap-2 border border-green-700 text-green-700 font-medium rounded-md px-6 py-3 hover:bg-green-50">
                <i class="fas fa-users"></i>
                Comprar Productos
            </a>
        </div>
    </div>
</section>


    {{-- SECCIÓN 2: ¿Por qué elegir AGROS? --}}
    <section class="bg-[#f9fcee] py-16 px-4 sm:px-6 lg:px-8">
        <h2 class="text-center text-3xl font-bold text-[#0f4a2f] mb-12">
            ¿Por qué elegir AGROS?
        </h2>
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-10">
            <div class="border border-[#c6f0d0] rounded-lg p-8 text-center shadow-sm bg-white">
                <div class="mx-auto mb-4 w-14 h-14 rounded-full bg-[#d9f6db] flex items-center justify-center text-xl text-[#0f4a2f]">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Productos Frescos</h3>
                <p class="text-sm leading-relaxed">
                    Directamente del campo a tu mesa, sin intermediarios
                </p>
            </div>
            <div class="border border-[#c6f0d0] rounded-lg p-8 text-center shadow-sm bg-white">
                <div class="mx-auto mb-4 w-14 h-14 rounded-full bg-[#fff1c7] flex items-center justify-center text-xl text-[#d18a00]">
                    <i class="fas fa-truck"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Entrega Confiable</h3>
                <p class="text-sm leading-relaxed">
                    Sistema de transporte seguro y eficiente
                </p>
            </div>
            <div class="border border-[#c6f0d0] rounded-lg p-8 text-center shadow-sm bg-white">
                <div class="mx-auto mb-4 w-14 h-14 rounded-full bg-[#d9f6db] flex items-center justify-center text-xl text-[#0f4a2f]">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Pagos Seguros</h3>
                <p class="text-sm leading-relaxed">
                    Transacciones protegidas y transparentes
                </p>
            </div>
        </div>
    </section>

    {{-- FOOTER NUEVO --}}
    <footer class="bg-[#14572B] text-[#D1F0C4] font-sans mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-10 md:gap-0">
                <div class="md:w-1/3">
                    <h2 class="font-extrabold text-white text-lg mb-3">AGROS</h2>
                    <p class="text-base leading-relaxed max-w-xs">
                        Conectando el campo peruano con la ciudad para un comercio agrícola más justo y directo.
                    </p>
                </div>
                <div class="md:w-1/3">
                    <h3 class="font-extrabold text-white text-lg mb-3">Contacto</h3>
                    <ul class="space-y-3 text-base">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone-alt"></i>
                            <span>+51 987 654 321</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope"></i>
                            <span>contacto@agros.pe</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Lima, Perú</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/3">
                    <h3 class="font-extrabold text-white text-lg mb-3">Síguenos</h3>
                    <div class="flex space-x-6 text-xl">
                        <a href="#" aria-label="Facebook" class="hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" aria-label="Twitter" class="hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" aria-label="Instagram" class="hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="border-t border-[#1E4B1B] my-8" />
            <p class="text-center text-base max-w-full">
                © 2024 AGROS Perú. Todos los derechos reservados.
            </p>
        </div>
    </footer>
</body>
</html>
