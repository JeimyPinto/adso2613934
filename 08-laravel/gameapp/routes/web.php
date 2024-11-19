<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Game;

Route::get('/', [CatalogueController::class, 'getSliders'])->name('home');

Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');
Route::get('/catalogue/{id}', function (Request $request) {
    $game = App\Models\Game::find($request->id);
    return view('/view-game')->with('game', $game);
});
Route::get('catalogue/add/{id}', function () {
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});
Route::post('catalogue/search', [CatalogueController::class, 'search']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/show/{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //GET, POST, PUT, DELETE
    Route::resources([
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'games' => GameController::class,
    ]);
});

Route::post('users/search', [UserController::class, 'search']);
Route::post('categories/search', [CategoryController::class, 'search']);
Route::post('games/search', [GameController::class, 'search'])->name('games.search');

Route::get('export/users/pdf', [UserController::class, 'pdf']);
Route::get('export/users/excel', [UserController::class, 'excel']);

Route::get('export/games/pdf', [GameController::class, 'pdf']);
Route::get('export/games/excel', [GameController::class, 'excel']);

Route::post('import/users', [UserController::class, 'import']);
require __DIR__ . '/auth.php';
