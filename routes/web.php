<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EpisodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', [TestController::class, 'test'])
->name('test');

Route::get('episode/create', [EpisodeController::class, 'create'])
->middleware(['auth']);

Route::post('episode', [EpisodeController::class, 'store'])
->name('episode.store');

Route::get('episode', [EpisodeController::class, 'index'])
->middleware(['auth']);

Route::get('episode/show/{episode}', [EpisodeController::class, 'show'])
->middleware(['auth'])->name('episode.show');

Route::get('episode/{episode}/edit', [EpisodeController::class, 'edit'])
->middleware(['auth'])->name('episode.edit');

Route::patch('episode/{episode}', [EpisodeController::class, 'update'])
->name('episode.update');

Route::delete('episode/{episode}', [EpisodeController::class, 'destroy'])
->name('episode.destroy');

require __DIR__.'/auth.php';
