<?php

use Illuminate\Database\Seeder;
use App\Models\Cuestionario;

class CuestionariosTableSeeder extends Seeder
{
    public function run()
    {
        Cuestionario::insert([
            ['id' => 1, 'title' => 'Star Wars', 'description' => 'Pon a prueba tu conocimiento...', 'created_at' => now(), 'updated_at' => now()],
            // Añadir el resto de los cuestionarios aquí...
        ]);
    }
}

