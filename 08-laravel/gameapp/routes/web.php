<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('hola amigos');
});

Route::get('/games/list', function () {
    $games = App\Models\Game::all();
    dd($games->toArray());
});

Route::get('/game/{id}', function () {
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});

Route::get('/games/', function () {
    $games = App\Models\Game::all();
    return view('listgames')->with('games', $games);
});

Route::get('users/take:20', function () {
    $user = App\Models\User::take(20)->get();

    foreach ($user as $u) {
        echo '<table border="1">'
            . '<tr>'
            . '<td>' . $u->fullname .  '</td>'
            . '<td>' . Carbon\Carbon::parse($u->birthdate)->age . ' years old' . '</td>'
            . '<td>' . $u->created_at->diffForHumans() . '</td>'
            . '</tr>' .
            '</table>';
    }
});
