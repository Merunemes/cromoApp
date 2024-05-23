<!-- resources/views/cuestionario/show.blade.php -->
<x-app-layout>
    <!-- Slot para el encabezado del layout -->
    <x-slot name="header">
        <!-- Título del cuestionario -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cuestionario: ') . $cuestionario->title }}
        </h2>
        <!-- Puntos del usuario -->
        <div class="text-lg text-white">
            Puntos: {{ auth()->user()->points }}
        </div>
    </x-slot>

    <!-- Estilo CSS para la imagen de fondo del main -->
    <style>
        main {
            background-image: url('https://i.imgur.com/SaieFux.jpeg'); 
            background-size: contain; 
            background-position: center; 
            background-repeat: repeat;
        }
    </style>

    <!-- Contenedor principal de la aplicación -->
    <div id="app"></div>

    <!-- Contenedor principal del contenido -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Caja con sombra y bordes redondeados -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Contenido de la pregunta -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Enunciado de la pregunta -->
                    <h3 class="text-lg font-semibold">{{ $pregunta->enunciado }}</h3>
                    <div class="mt-4">
                        <!-- Botones de respuesta -->
                        @foreach ($respuestas as $respuesta)
                            <button class="bg-orange-300 hover:bg-orange-400 text-black font-bold py-2 px-4 rounded m-2 respuesta-btn"
                                    data-correct="{{ $respuesta->isCorrect ? 1 : 0 }}"
                                    data-next-url="{{ route('cuestionario.siguientePregunta', ['cuestionarioId' => $cuestionario->id, 'preguntaId' => $pregunta->id]) }}">
                                {{ $respuesta->questionText }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluye SweetAlert2 para las notificaciones -->
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script JavaScript para manejar la lógica de las respuestas -->
    <script defer>
        document.querySelectorAll('.respuesta-btn').forEach(button => {
            button.addEventListener('click', function() {
                const isCorrect = this.getAttribute('data-correct') === '1';
                const nextUrl = this.getAttribute('data-next-url');

              

                if (isCorrect) {
                    fetch('{{ route('update.points') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ points: 20 })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Respuesta correcta!',
                                text: 'Se han añadido 20 puntos.',
                                timer: 1500, // Muestra la notificación por 1.5 segundos
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.href = nextUrl;
                            }, 1500); // Retraso antes de redirigir
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Hubo un problema al actualizar los puntos.',
                                timer: 2000, // Muestra la notificación por 2 segundos
                                showConfirmButton: false
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Respuesta incorrecta!',
                        text: 'Inténtalo de nuevo.',
                        timer: 1500, // Muestra la notificación por 1.5 segundos
                        showConfirmButton: false
                    });

                    setTimeout(() => {
                        window.location.href = '{{ route('dashboard') }}';
                    }, 1500); // Retraso antes de redirigir
                }
            });
        });
    </script>
</x-app-layout>
