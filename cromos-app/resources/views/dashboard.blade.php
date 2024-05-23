<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <!-- Slot para el encabezado del layout -->
    <x-slot name="header">
        <!-- Título del encabezado -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TU ESTAMPITUM') }}
        </h2>
        <!-- Muestra los puntos del usuario autenticado -->
        <div class="text-lg text-white">
            Puntos: {{ auth()->user()->points }}
        </div>
    </x-slot>

    <!-- Contenedor principal con espaciado vertical y fondo blanco o gris oscuro -->
    <div class="py-12 bg-white dark:bg-gray-800">
        <!-- Contenedor centrado con máximo ancho y padding horizontal -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Caja contenedora con fondo blanco o gris oscuro, sombra y bordes redondeados -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Sección de bienvenida con padding y texto gris oscuro o claro -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("¡Vamos allá, ") }} {{ auth()->user()->name }}{{ __("!") }}
                </div>
                <!-- Sección de enlaces a la tienda y colección con botones estilizados -->
                <div class="p-6">
                    <a href="{{ route('store') }}" class="inline-block px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white dark:text-gray-900 dark:hover:text-gray-100 rounded-md">
                        Tienda de cromos
                    </a>
                    <br><br>
                    <a href="{{ route('collection') }}" class="inline-block px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white dark:text-gray-900 dark:hover:text-gray-100 rounded-md ml-2">
                        Colección
                    </a>
                </div>
                <!-- Sección de cuestionarios disponibles -->
                <div class="mt-4 text-center">
                    <!-- Título de la sección -->
                    <h3 class="font-semibold text-lg text-orange-500 dark:text-orange-400">{{ __('Cuestionarios Disponibles') }}</h3>
                    <!-- Lista de cuestionarios -->
                    <ul>
                        <!-- Itera sobre los cuestionarios y crea un enlace para cada uno -->
                        @foreach ($cuestionarios as $cuestionario)
                        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-transform duration-300 transform hover:scale-105 hover:bg-yellow-100 dark:hover:bg-yellow-700 rounded-md">
                            <a href="{{ route('cuestionarios.show', $cuestionario->id) }}" class="text-yellow-600 dark:text-yellow-400 text-center block">{{ $cuestionario->title }}</a>
                        </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
