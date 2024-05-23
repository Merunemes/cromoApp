<x-app-layout>
    <!-- Slot para el encabezado del layout -->
    <x-slot name="header">
        <!-- Título de la tienda -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tienda de Cromos') }}
        </h2>
        <!-- Puntos del usuario -->
        <div class="text-lg text-white">
            Puntos: {{ auth()->user()->points }}
        </div>
    </x-slot>

    <!-- Enlace a la colección de cromos -->
    <div class="p-6">
        <a href="{{ route('collection') }}" class="inline-block px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white dark:text-gray-900 dark:hover:text-gray-100 rounded-md ml-2">
            Colección
        </a>
    </div>

    <!-- Contenedor principal del contenido -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensajes de éxito o error -->
            @if (session('success'))
                <div class="alert alert-success bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger bg-red-500 text-white p-4 rounded mb-4">{{ session('error') }}</div>
            @endif
            
            <!-- Grid de cromos disponibles -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($cromos as $cromo)
                    <!-- Determinar el color de fondo basado en los puntos del cromo -->
                    @php
                    $bgColor = 'bg-white dark:bg-gray-700';
                    if ($cromo->points >= 1000) {
                        $bgColor = 'bg-yellow-400 dark:bg-yellow-500';
                    } elseif ($cromo->points >= 500) {
                        $bgColor = 'bg-gray-400 dark:bg-gray-500';
                    }
                    @endphp

                    <!-- Caja contenedora del cromo -->
                    <div class="{{ $bgColor }} p-4 rounded-lg shadow">
                        <!-- Imagen del cromo -->
                        <img src="{{ $cromo->image }}" class="card-img-top w-full h-48 object-cover" alt="{{ $cromo->name }}">
                        <div class="card-body p-4">
                            <!-- Nombre del cromo -->
                            <h5 class="card-title text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $cromo->name }}</h5>
                            <!-- Puntos requeridos para comprar el cromo -->
                            <p class="card-text text-gray-600 dark:text-gray-400">Puntos requeridos: {{ $cromo->points }}</p>
                            <!-- Formulario para comprar el cromo -->
                            <form action="{{ route('comprar.cromo', $cromo->id) }}" method="POST" id="form-comprar-{{ $cromo->id }}">
                                @csrf
                                <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Comprar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Contenedor para notificaciones Toastify -->
    <div id="toasty-component"></div>

    <!-- Script para ocultar los mensajes de éxito o error después de 5 segundos -->
    <script>
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>
</x-app-layout>
