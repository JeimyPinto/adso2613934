<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controller\CatalogueController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');

Route::get('/games/', function () {
    $games = App\Models\Game::all();
    return view('listgames')->with('games', $games);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/show/{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resources([
        'users' => UserController::class,
        'categories'=> CategoryController::class,
    ]);
});

Route::post('users/search', [UserController::class, 'search']);

Route::post('categories/search',[CategoryController::class,'search']);

Route::get('export/users/pdf', [UserController::class, 'pdf']);
Route::get('export/users/excel', [UserController::class, 'excel']);

require __DIR__ . '/auth.php';
