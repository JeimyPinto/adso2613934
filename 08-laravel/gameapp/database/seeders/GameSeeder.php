<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creación de juegos
        $game = new Game;
        $game->title = 'Ninja Rush';
        $game->developer = 'Shadow Devs';
        $game->releasedate = '2023-05-15';
        $game->category_id = 2;
        $game->user_id = 1;
        $game->price = 20.00;
        $game->gender = 'Acción';
        $game->description = 'Enfréntate a hordas de enemigos en este trepidante juego de acción donde cada nivel es un nuevo desafío.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'Island Explorer';
        $game->developer = 'Adventure';
        $game->releasedate = '2024-07-22';
        $game->category_id = 1; 
        $game->user_id = 1;
        $game->price = 25.00;
        $game->gender = 'El tato';
        $game->description = 'Explora islas misteriosas y descubre tesoros ocultos en este emocionante juego de aventuras.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        // Juego de Battle Royale
        $game = new Game;
        $game->title = 'Last Stand';
        $game->developer = 'Battle Games Inc.';
        $game->releasedate = '2023-11-09';
        $game->category_id = 3; 
        $game->user_id = 1;
        $game->price = 0.00;
        $game->gender = 'Battle Royale';
        $game->description = 'Sobrevive en un vasto campo de batalla, lucha contra otros jugadores y sé el último en pie en este intenso juego de Battle Royale.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();
    }
}
