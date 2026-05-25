<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Juego;
use App\Models\Rating;

class ComentarioSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $juegos = Juego::all();

        if ($users->isEmpty() || $juegos->isEmpty()) {
            return;
        }

        foreach ($users as $user) {
            foreach ($juegos as $juego) {

                //  Comentario
                Comentario::create([
                    'user_id' => $user->id,
                    'juego_id' => $juego->id,
                    'texto' => fake()->sentence(),
                ]);

                //  Rating (evita duplicados)
                Rating::firstOrCreate(
                    [
                        'user_id' => $user->id,
                        'juego_id' => $juego->id,
                    ],
                    [
                        'rating' => fake()->numberBetween(1, 5),
                    ]
                );

            }
        }
    }
}