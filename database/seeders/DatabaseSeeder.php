<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Juego;
use App\Models\Genero;
use Illuminate\Database\Seeder;
use Database\Seeders\ComentarioSeeder;
use Database\Seeders\GeneroSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        //  USERS normales
        User::factory(5)->create([
            'role' => 'user',
        ]);

        //  GENEROS
        $generos = [
            'Acción',
            'Aventura',
            'RPG',
            'Deportes',
            'Terror',
            'Estrategia',
            'Shooter'
        ];

        foreach ($generos as $nombre) {
            Genero::create([
                'nombre' => $nombre
            ]);
        }

        //  JUEGOS
        Juego::factory(10)->create();

        //  COMENTARIOS
        $this->call([
            ComentarioSeeder::class,
        ]);
    }
}