<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::paginate(4);
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('games.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = $request->file('image')->getClientOriginalName();

            // Define la ruta de destino
            $destinationPath = public_path('images/games');

            // Mueve el archivo a la ruta de destino
            $photo->move($destinationPath, $photoName);
        } else {
            $photoName = 'no-game.png';
        }
        $game = new Game();
        $game->title = $request->title;
        $game->image = $photoName;
        $game->developer = $request->developer;
        $game->releasedate = $request->releasedate;
        $game->category_id = $request->category_id;
        $game->user_id = $request->user_id;
        $game->price = $request->price;
        $game->slider = $request->slider;    

        if ($game->save()) {
            return redirect('games')->with('message', 'Juego ' . $game->title . ' creado con éxito');
        }

        // Add a return statement here
        return redirect('games')->with('message', 'Error al crear el juego');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }

    /**
     * Summary of search
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $games = Game::names($request->q)->paginate(4);
        return view('games.search')->with('games', $games);
    }
}
