<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Acceso - AGROS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F3F7E9] min-h-screen flex flex-col items-center pt-10 px-4">
    <a href="{{ url('/') }}" class="text-[#1B6B3A] text-sm flex items-center mb-4 hover:underline">
        <i class="fas fa-arrow-left mr-1"></i> Volver al inicio
    </a>

    <div class="flex items-center text-[#1B6B3A] font-extrabold text-2xl mb-6 select-none">
        <i class="fas fa-seedling mr-2"></i> AGROS
    </div>

    <div class="w-full max-w-md">
        <div class="flex bg-[#F7F7F7] rounded-t-md text-sm text-[#7B7B7B] font-normal">
            <button id="btn-login" class="flex-1 py-2 bg-white rounded-t-md font-semibold text-black border-b-2 border-[#1B6B3A]" type="button">
                Iniciar Sesión
            </button>
            <button id="btn-register" class="flex-1 py-2 rounded-t-md" type="button">
                Registrarse
            </button>
        </div>

        {{-- FORMULARIO LOGIN --}}
        <form id="form-login" class="bg-white rounded-b-md p-6 shadow-sm" method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="text-[#1B6B3A] font-semibold text-xl mb-6 text-center">Iniciar Sesión</h2>

            <label for="email" class="block text-sm font-semibold mb-1">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                required autofocus
                class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#1B6B3A]" />
            @error('email')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for="password" class="block text-sm font-semibold mb-1">Contraseña</label>
            <input id="password" type="password" name="password"
                required
                class="w-full mb-6 px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#1B6B3A]" />
            @error('password')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <button type="submit" class="w-full bg-[#1B6B3A] text-white font-semibold py-3 rounded-md hover:bg-[#16522a] transition-colors">
                Iniciar Sesión
            </button>
        </form>

        {{-- FORMULARIO REGISTRO --}}
        <form id="form-register" class="hidden bg-white rounded-b-md p-6 shadow-sm" method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="text-[#1B6B3A] font-semibold text-xl mb-6 text-center">Registrarse</h2>

            <label for="name" class="block text-sm font-semibold mb-1">Nombre</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#1B6B3A]" />
            @error('name')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for="email_register" class="block text-sm font-semibold mb-1">Correo electrónico</label>
            <input id="email_register" name="email" type="email" value="{{ old('email') }}" required
                class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#1B6B3A]" />
            @error('email')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for="password_register" class="block text-sm font-semibold mb-1">Contraseña</label>
            <input id="password_register" name="password" type="password" required
                class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#1B6B3A]" />
            @error('password')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for="password_confirmation" class="block text-sm font-semibold mb-1">Confirmar contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                class="w-full mb-6 px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#1B6B3A]" />

            <label for="role" class="block text-sm font-semibold mb-1">Rol</label>
            <select name="role" id="role" required class="w-full mb-6 px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#1B6B3A]">
                <option value="agricultor">Agricultor</option>
                <option value="comprador">Comprador</option>
                <option value="transportista">Transportista</option>
            </select>
            @error('role')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <button type="submit" class="w-full bg-[#1B6B3A] text-white font-semibold py-3 rounded-md hover:bg-[#16522a] transition-colors">
                Registrarse
            </button>
        </form>
    </div>

    <script>
        
        const btnLogin = document.getElementById('btn-login');
        const btnRegister = document.getElementById('btn-register');
        const formLogin = document.getElementById('form-login');
        const formRegister = document.getElementById('form-register');

        btnLogin.addEventListener('click', () => {
            btnLogin.classList.add('bg-white', 'font-semibold', 'text-black', 'border-b-2', 'border-[#1B6B3A]');
            btnRegister.classList.remove('bg-white', 'font-semibold', 'text-black', 'border-b-2', 'border-[#1B6B3A]');
            formLogin.classList.remove('hidden');
            formRegister.classList.add('hidden');
        });

        btnRegister.addEventListener('click', () => {
            btnRegister.classList.add('bg-white', 'font-semibold', 'text-black', 'border-b-2', 'border-[#1B6B3A]');
            btnLogin.classList.remove('bg-white', 'font-semibold', 'text-black', 'border-b-2', 'border-[#1B6B3A]');
            formRegister.classList.remove('hidden');
            formLogin.classList.add('hidden');
        });
         const tabFromSession = "{{ session('tab') }}";
        if (tabFromSession === 'register') {
            btnRegister.click();
        } else {
            btnLogin.click();
        }
    </script>
</body>
</html>
