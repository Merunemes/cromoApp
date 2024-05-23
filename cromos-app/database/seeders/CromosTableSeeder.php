<?php

use Illuminate\Database\Seeder;
use App\Models\Cromo;

class CromosTableSeeder extends Seeder
{
    public function run()
    {
        Cromo::insert([
            ['id' => 1, 'cuestionario_id' => 1, 'name' => 'Darth Vader', 'description' => 'El icónico Lord Sith...', 'points' => 50, 'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/32/Star_Wars_-_Darth_Vader.jpg'],
            // Añadir el resto de los cromos aquí...
        ]);
    }
}

