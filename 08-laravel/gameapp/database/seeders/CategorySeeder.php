<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creación de categorías ficticias
        $cat = new Category;
        $cat->name = 'Acción';
        $cat->description = 'Juegos que enfatizan las pruebas físicas, incluyendo la coordinación mano-ojo y la reacción en tiempo real.';
        $cat->releasedate = '2021-01-01';
        $cat->created_at = now();
        $cat->updated_at = now();
        $cat->save();
        
        $cat = new Category;
        $cat->name = 'Aventura';
        $cat->description = 'Juegos centrados en la narrativa, exploración y resolución de puzzles.';
        $cat->releasedate = '2021-01-01';
        $cat->created_at = now();
        $cat->updated_at = now();
        $cat->save();
        
        $cat = new Category;
        $cat->name = 'Battle Royale';
        $cat->description = 'Juegos multijugador competitivos donde los jugadores buscan ser el último en sobrevivir.';
        $cat->releasedate = '2021-01-01';
        $cat->created_at = now();
        $cat->updated_at = now();
        $cat->save();
    }
}
