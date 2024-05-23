<?php

namespace App\Http\Controllers;

use App\Models\Cromo; // Importa el modelo Cromo
use App\Models\User; // Importa el modelo User
use Illuminate\Http\Request; // Importa la clase Request
use Illuminate\Support\Facades\Auth; // Importa la clase Auth


class StoreController extends Controller
{
    // Método para mostrar la tienda de cromos
    public function index()
    {
        $cromos = Cromo::all(); // Obtiene todos los cromos
        return view('store.index', compact('cromos')); // Retorna la vista de la tienda con los cromos
    }

    // Método para manejar la compra de cromos
    public function comprarCromo(Request $request, $cromo)
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
    
        // Asegúrate de que el $cromo recibido sea el ID del cromo
        $cromo = Cromo::findOrFail($cromo); // Busca el cromo por ID o falla si no se encuentra
    
        // Verifica si el usuario ya posee el cromo
        if (!$user->cromos->contains($cromo->id)) {
            // Verifica si el usuario tiene suficientes puntos
            if ($user->points >= $cromo->points) {
                // Asocia el cromo al usuario
                $user->cromos()->attach($cromo->id);
        
                // Resta los puntos del usuario
                $user->points -= $cromo->points;
                $user->save(); // Guarda los cambios en el usuario
        
                return redirect()->back()->with('success', '¡Cromo comprado exitosamente!');
            } else {
                return redirect()->back()->with('error', 'No tienes suficientes puntos para comprar este cromo.');
            }
        } else {
            return redirect()->back()->with('error', 'Ya tienes este cromo.');
        }
    }
}
