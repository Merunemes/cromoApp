<x-app-layout>
    <!-- Slot para el encabezado del layout -->
    <x-slot name="header">
        <!-- Título del encabezado -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mi Colección de Cromos') }}
        </h2>
    </x-slot>

    <!-- Botón para ir a la tienda de cromos -->
    <div class="p-6">
        <a href="{{ route('store') }}" class="inline-block px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white dark:text-gray-900 dark:hover:text-gray-100 rounded-md">
            Tienda de cromos
        </a>
    </div>

    <!-- Contenedor principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Título de la colección -->
                    <h1 class="text-2xl mb-6">Mi Colección de Cromos</h1>

                    <!-- Contenedor para el componente de Vue.js -->
                    <div id="app"></div>

                    <!-- Contenedor para el progreso de la colección -->
                    <div id="collection-progress" data-total-cromos="{{ $totalCromos }}" data-collected-cromos="{{ $totalUsuarioCromos }}">
                        <!-- Aquí se renderizará el componente de progreso de colección -->
                    </div>

                    <!-- Itera sobre los cuestionarios -->
                    @foreach ($cuestionarios as $cuestionario)
                        <!-- Título del cuestionario -->
                        <h3 class="text-xl font-bold mt-8">{{ $cuestionario->title }}</h3>
                        <!-- Contenedor de cromos con diseño de grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                            @foreach ($cromosPorCuestionario[$cuestionario->id] as $cromo)
                            @php
                                // Determina el color de fondo basado en los puntos del cromo
                                $bgColor = 'bg-white dark:bg-gray-700';
                                if ($cromo->points >= 1000) {
                                    $bgColor = 'bg-yellow-400 dark:bg-yellow-500';
                                } elseif ($cromo->points >= 500) {
                                    $bgColor = 'bg-gray-400 dark:bg-gray-500';
                                }
                            @endphp
                            <!-- Contenedor individual de cada cromo -->
                            <div class="{{ $bgColor }} p-4 rounded-lg shadow transform hover:scale-105">
                                <!-- Imagen del cromo -->
                                <img src="{{ $cromo->image }}" class="w-full h-48 object-cover rounded-t-lg" alt="{{ $cromo->name }}">
                                <!-- Información del cromo -->
                                <div class="p-4">
                                    <h5 class="text-lg font-semibold">{{ $cromo->name }}</h5>
                                    <p class="mt-2 text-sm text-white-600 dark:text-gray-200">{{ $cromo->description }}</p>
                                    <!-- Contenedor de fondo del cromo -->
                                    <div class="{{ $bgColor }} p-4 rounded-lg shadow">
                                        <!-- Componente de Vue.js para el cromo -->
                                        <Cromo :cromo="{{ json_encode($cromo) }}"></Cromo>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
