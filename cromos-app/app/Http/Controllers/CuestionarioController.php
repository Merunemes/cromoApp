<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario; // Importa el modelo Cuestionario
use App\Models\Pregunta; // Importa el modelo Pregunta
use App\Models\Respuesta; // Importa el modelo Respuesta
use Illuminate\Http\Request; // Importa la clase Request

class CuestionarioController extends Controller
{
    // Método para mostrar todos los cuestionarios en el dashboard
    public function index()
    {
        $cuestionarios = Cuestionario::all(); // Obtiene todos los cuestionarios
        return view('dashboard', ['cuestionarios' => $cuestionarios]); // Retorna la vista del dashboard con los cuestionarios
    }

    // Método para mostrar un cuestionario específico
    public function show($id)
    {
        $cuestionarios = Cuestionario::all(); // Obtiene todos los cuestionarios
        $cuestionario = Cuestionario::findOrFail($id); // Busca el cuestionario por ID o falla si no se encuentra

        $preguntas = Pregunta::where('idCuestionario', $id)->get(); // Obtiene las preguntas del cuestionario
        $pregunta = $preguntas->first(); // Obtiene la primera pregunta

        // Si no hay preguntas, redirige al dashboard con un mensaje de error
        if (!$pregunta) {
            return redirect()->route('dashboard')->with('error', 'No hay preguntas disponibles en este cuestionario.');
        }

        $respuestas = Respuesta::where('idPregunta', $pregunta->id)->get()->shuffle(); // Obtiene y mezcla las respuestas de la pregunta

        // Retorna la vista del cuestionario con los datos necesarios
        return view('cuestionario.show', compact('cuestionarios', 'cuestionario', 'pregunta', 'respuestas'));
    }

    // Método para mostrar la siguiente pregunta de un cuestionario
    public function siguientePregunta($cuestionarioId, $preguntaId)
    {
        $cuestionario = Cuestionario::findOrFail($cuestionarioId); // Busca el cuestionario por ID o falla si no se encuentra
        $pregunta = Pregunta::where('idCuestionario', $cuestionarioId)
                            ->where('id', '>', $preguntaId)
                            ->first(); // Busca la siguiente pregunta del cuestionario

        // Si no hay más preguntas, redirige al dashboard con un mensaje
        if (!$pregunta) {
            return redirect()->route('dashboard')->with('message', 'Has completado el cuestionario.');
        }

        $respuestas = Respuesta::where('idPregunta', $pregunta->id)->get(); // Obtiene las respuestas de la nueva pregunta

        // Retorna la vista del cuestionario con los datos de la nueva pregunta
        return view('cuestionario.show', compact('cuestionario', 'pregunta', 'respuestas'));
    }
}
