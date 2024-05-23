<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estampitum') }}
        </h2>
    </x-slot>

    <x-slot name="styles">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </x-slot>

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-100 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">Inicio</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-100 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">Iniciar sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-100 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            

            <div class="text-center">
                <h1 class="text-5xl font-bold text-gray-100 mb-4">¡Comienza aquí tu colección!</h1>
                <p class="text-lg text-gray-200 mb-8">¡Colecciónalos todos!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Puedes agregar imágenes aquí -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
                    <img src="{{ asset('https://upload.wikimedia.org/wikipedia/en/0/02/Homer_Simpson_2006.png') }}" alt="Cromo 1" class="w-full h-48 object-cover rounded-t-lg">
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
                    <img src="{{ asset('https://cdn.wikimg.net/en/metroidwiki/images/4/47/Samus_sm_Artwork.png') }}" alt="Cromo 2" class="w-full h-48 object-cover rounded-t-lg">
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
                    <img src="{{ asset('https://media.fortniteapi.io/images/cosmetics/b220189abad77753196786dac70ac9ad/v2/MI_Character_BananaAdventure/background.png') }}" alt="Cromo 3" class="w-full h-48 object-cover rounded-t-lg">
                </div>
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-white text-red-500 font-semibold text-lg rounded-md shadow hover:bg-gray-100 focus:outline-none focus:bg-gray-200">¡Regístrate Ahora!</a>
            </div>
        </div>
    </div>
</x-guest-layout>
