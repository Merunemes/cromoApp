<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Users
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Pepe',
                'email' => 'pepemail@gmail.com',
                'password' => Hash::make('password'), // Adjust as needed
                'points' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Juan',
                'email' => 'juanmail@gmail.com',
                'password' => Hash::make('password'),
                'points' => 150,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Antonia',
                'email' => 'antoniamail@gmail.com',
                'password' => Hash::make('password'),
                'points' => 200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Paco',
                'email' => 'pacomail@gmail.com',
                'password' => Hash::make('password'),
                'points' => 1800,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Bachatitas',
                'email' => 'bachatamail@gmail.com',
                'password' => Hash::make('password'),
                'points' => 35,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Cromos
        DB::table('cromos')->insert([
            [
                'id' => 1,
                'cuestionario_id' => 1,
                'name' => 'Darth Vader',
                'description' => 'El icónico Lord Sith con su imponente armadura negra y respiración covidiana.',
                'points' => 50,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/32/Star_Wars_-_Darth_Vader.jpg',
            ],
            [
                'id' => 2,
                'cuestionario_id' => 3,
                'name' => 'Pikachu',
                'description' => 'La adorable y poderosa mascota eléctrica de mejillas coloradas.',
                'points' => 75,
                'image' => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/detail/025.png',
            ],
            [
                'id' => 3,
                'cuestionario_id' => 2,
                'name' => 'Smaug',
                'description' => 'El dragón de Erebor, con piel dorada y ojos ardientes, celoso de su tesoro.',
                'points' => 100,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Smaug_par_David_Demaret.jpg/1200px-Smaug_par_David_Demaret.jpg',
            ],
            // Continue with the rest of the cromos
        ]);
    }
}
