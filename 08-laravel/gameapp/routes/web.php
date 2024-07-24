<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/catalogue', function () {
    return view('catalogue');
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

Route::get('/dashboard', function () {
    $user = User::where('id', auth()->id())->first();
    return view('dashboard')->with('user', $user);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/show', function () {
        $userLogged = User::where('id', auth()->id())->first();
        return view('profile')->with('user', $userLogged);
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resources([
        'users' => UserController::class,
    ]);
});

require __DIR__ . '/auth.php';
