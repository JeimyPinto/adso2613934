<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\GameExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $game = new Game;
        $game->title = $request->title;
        $game->image = $photoName;
        $game->developer = $request->developer;
        $game->releasedate = $request->releasedate;
        $game->category_id = $request->category_id;
        $game->user_id = Auth::user()->id;
        $game->price = $request->price;
        $game->slider = $request->slider;
        $game->description = $request->description;
        $game->gender = $request->gender;

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
        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $categories = Category::all();
        return view('games.edit')->with('game', $game)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, Game $game)
    {
        // Manejar la subida de la imagen
        if ($request->hasFile('image')) {
            // Obtener la ruta de la imagen actual
            $currentImagePath = public_path('images/games/' . $game->image);

            // Verificar si la imagen actual existe y eliminarla
            if (file_exists($currentImagePath) && $game->image !== 'no-game.png') {
                unlink($currentImagePath);
            }

            // Subir la nueva imagen
            $photo = $request->file('image');
            $photoName = $photo->getClientOriginalName();
            $destinationPath = public_path('images/games');
            $photo->move($destinationPath, $photoName);
        } else {
            $photoName = $request->originphoto ?? $game->image;
        }

        // Asignar los valores del formulario al juego
        $game->title = $request->title;
        $game->image = $photoName;
        $game->developer = $request->developer;
        $game->releasedate = $request->releasedate;
        $game->category_id = $request->category_id;
        $game->user_id = Auth::user()->id;
        $game->price = $request->price;
        $game->slider = $request->slider;
        $game->description = $request->description;
        $game->gender = $request->gender;

        // Guardar los cambios en el juego
        if ($game->save()) {
            return redirect('games')->with('message', 'Juego ' . $game->title . ' modificado con éxito');
        }

        return redirect('games')->with('message', 'Error al modificar el juego');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        if ($game->delete()) {
            return redirect('games')->with('message', 'Juego ' . $game->title . ' eliminado con éxito');
        }
        return redirect('games')->with('message', 'Error al eliminar el juego');
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

    public function pdf()
    {
        $games = Game::all();
        $pdf = PDF::loadView('games.pdf', compact('games'));
        return $pdf->setPaper('a4', 'landscape')->download('allgames.pdf');
    }
    public function excel()
    {
        return Excel::download(new GameExport, 'allgames.xlsx');
    }
}
