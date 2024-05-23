<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importa la clase Request
use Illuminate\Support\Facades\Auth; // Importa la clase Auth para la autenticación
use App\Models\User; // Importa el modelo User

class UserController extends Controller
{
    // Método para actualizar los puntos del usuario
    public function updatePoints(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'points' => 'required|integer', // Valida que 'points' sea requerido y un entero
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user(); // Obtiene el usuario actualmente autenticado

        // Actualizar los puntos del usuario
        $user->points += $request->points; // Suma los puntos del request a los puntos actuales del usuario
        $user->save(); // Guarda los cambios en la base de datos

        // Devolver una respuesta JSON
        return response()->json(['success' => true]); // Retorna una respuesta JSON indicando éxito
    }
}
