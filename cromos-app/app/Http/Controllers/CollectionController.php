<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Importa la fachada de autenticación
use App\Models\Cromo; // Importa el modelo Cromo
use App\Models\Cuestionario; // Importa el modelo Cuestionario
use Illuminate\Http\Request; // Importa la clase Request

class CollectionController extends Controller
{
    // Método para mostrar la colección de cromos del usuario
    public function index()
    {
        // Obtiene el usuario autenticado y carga sus cromos relacionados
        $user = Auth::user()->load('cromos');

        // Obtiene los cromos del usuario
        $cromos = $user->cromos;
        
        // Obtiene el total de cromos disponibles en la base de datos
        $totalCromos = Cromo::count();
        
        // Cuenta el total de cromos que el usuario tiene
        $totalUsuarioCromos = $cromos->count();
        
        // Agrupa los cromos del usuario por el id del cuestionario
        $cromosPorCuestionario = $cromos->groupBy('cuestionario_id');
        
        // Obtiene los cuestionarios que contienen los cromos del usuario
        $cuestionarios = Cuestionario::whereIn('id', $cromosPorCuestionario->keys())->get();

        // Devuelve la vista 'collection.index' con las variables compactadas
        return view('collection.index', compact('user', 'totalCromos', 'totalUsuarioCromos', 'cromosPorCuestionario', 'cuestionarios'));
    }
}
