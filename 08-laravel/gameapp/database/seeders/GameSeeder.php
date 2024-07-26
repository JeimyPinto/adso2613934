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
        $game->image = 'ninja_rush.jpg';
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
        $game->title = 'FIFA 23';
        $game->image = 'fifa_23.jpg';
        $game->developer = 'EA Sports';
        $game->releasedate = '2022-09-27';
        $game->category_id = 4;
        $game->user_id = 1;
        $game->price = 59.99;
        $game->gender = 'Deportes';
        $game->description = 'El juego de fútbol más popular del mundo con gráficos mejorados y nuevas características.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'Age of Empires IV';
        $game->image = 'age_of_empires_iv.png';
        $game->developer = 'Relic Entertainment';
        $game->releasedate = '2021-10-28';
        $game->category_id = 5;
        $game->user_id = 1;
        $game->price = 49.99;
        $game->gender = 'Estrategia';
        $game->description = 'Construye tu imperio y conquista el mundo en este clásico juego de estrategia en tiempo real.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'The Witcher 3: Wild Hunt';
        $game->image = 'the_witcher_3.jpg';
        $game->developer = 'CD Projekt Red';
        $game->releasedate = '2015-05-19';
        $game->category_id = 6;
        $game->user_id = 1;
        $game->price = 39.99;
        $game->gender = 'RPG';
        $game->description = 'Embárcate en una épica aventura en un mundo abierto lleno de monstruos y magia.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'The Sims 4';
        $game->image = 'the_sims_4.jpg';
        $game->developer = 'Maxis';
        $game->releasedate = '2014-09-02';
        $game->category_id = 7;
        $game->user_id = 1;
        $game->price = 29.99;
        $game->gender = 'Simulación';
        $game->description = 'Crea y controla personas en un mundo virtual donde las únicas limitaciones son tu imaginación.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'Portal 2';
        $game->image = 'portal_2.jpg';
        $game->developer = 'Valve';
        $game->releasedate = '2011-04-19';
        $game->category_id = 8;
        $game->user_id = 1;
        $game->price = 19.99;
        $game->gender = 'Puzzle';
        $game->description = 'Resuelve ingeniosos rompecabezas utilizando un dispositivo de portales en este aclamado juego de lógica.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'Forza Horizon 5';
        $game->image = 'forza_horizon_5.jpg';
        $game->developer = 'Playground Games';
        $game->releasedate = '2021-11-09';
        $game->category_id = 9;
        $game->user_id = 1;
        $game->price = 59.99;
        $game->gender = 'Carreras';
        $game->description = 'Compite en emocionantes carreras a través de un mundo abierto con impresionantes gráficos y una gran variedad de coches.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'Shadow Strike';
        $game->image = 'shadow_strike.png';
        $game->developer = 'Action Studios';
        $game->releasedate = '2023-08-15';
        $game->category_id = 1;
        $game->user_id = 1;
        $game->price = 49.99;
        $game->gender = 'Acción';
        $game->description = 'Sumérgete en intensas batallas y misiones llenas de adrenalina en este emocionante juego de acción.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'Super Animal Royale';
        $game->image = 'super_animal_royale.jpg';
        $game->developer = 'Pixile Studios';
        $game->releasedate = '2021-12-07';
        $game->category_id = 3;
        $game->user_id = 1;
        $game->price = 14.99;
        $game->gender = 'Battle Royale';
        $game->description = 'Lucha por ser el último animal en pie en este adorable pero mortal juego de Battle Royale.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();

        $game = new Game;
        $game->title = 'Stardew Valley';
        $game->image = 'stardew_valley.jpg';
        $game->developer = 'ConcernedApe';
        $game->releasedate = '2016-02-26';
        $game->category_id = 7;
        $game->user_id = 1;
        $game->price = 14.99;
        $game->gender = 'Simulación';
        $game->description = 'Construye la granja de tus sueños: cría animales, cultiva, personaliza tu granja y mucho más.';
        $game->created_at = now();
        $game->updated_at = now();
        $game->save();
    }
}
