<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Game;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $games = Game::all();
        return view('/catalogue')->with('categories', $categories)->with('games', $games);
    }


    /**
     * función que se encarga de buscar los juegos que coincidan con la búsqueda
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $games = Game::with('category')
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        $categories = $games->pluck('category')->unique('id');

        return view('search', compact('games', 'categories'));
    }

    /**
     * Obtiene todos los juegos que tienen la propiedad slider en 1
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function getSliders()
    {
        $sliders = Game::where('slider', 1)->get();
        return view('welcome')->with('sliders', $sliders);
    }
}
