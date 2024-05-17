<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SitemapController;

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

if (config('app.env') === 'production' or config('app.env') === 'staging') {
    // asset()やurl()がhttpsで生成される
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['auth', 'can:admin'])->group(function() {
        Route::get('profile/index', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/adedit/{user}', [ProfileController::class, 'adedit'])->name('profile.adedit');
        Route::patch('/profile/adupdate/{user}', [ProfileController::class, 'adupdate'])->name('profile.adupdate');
        Route::delete('profile/{user}', [ProfileController::class, 'addestroy'])->name('profile.addestroy');
        Route::patch('roles/{user}/attach', [RoleController::class, 'attach'])->name('role.attach');
        Route::patch('roles/{user}/detach', [RoleController::class, 'detach'])->name('role.detach');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['verified'])->group(function() {
    Route::get('episode/myepisode', [EpisodeController::class, 'myepisode'])
    ->name('episode.myepisode');

    Route::get('episode/mycomment', [EpisodeController::class, 'mycomment'])
    ->name('episode.mycomment');

    Route::get('/test', [TestController::class, 'test'])
    ->name('test');

    Route::get('episode/create', [EpisodeController::class, 'create'])
    ->middleware(['auth'])->name('episode.create');

    Route::post('episode', [EpisodeController::class, 'store'])
    ->name('episode.store');

    Route::get('episode', [EpisodeController::class, 'index'])
    ->middleware(['auth'])->name('episode.index');

    Route::get('/ranking', [EpisodeController::class, 'ranking'])
    ->middleware(['auth'])->name('episode.ranking');

    Route::get('episode/show/{episode}', [EpisodeController::class, 'show'])
    ->middleware(['auth'])->name('episode.show');

    Route::get('episode/{episode}/edit', [EpisodeController::class, 'edit'])
    ->middleware(['auth'])->name('episode.edit');

    Route::patch('episode/{episode}', [EpisodeController::class, 'update'])
    ->name('episode.update');

    Route::delete('episode/{episode}', [EpisodeController::class, 'destroy'])
    ->name('episode.destroy');

    Route::post('episode/comment/store', [CommentController::class, 'store'])
    ->name('comment.store');
    
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');

    // いいねボタン
    Route::get('/nice/nice/{episode}', [NiceController::class, 'nice'])->name('nice');
    Route::get('/nice/unnice/{episode}', [NiceController::class, 'unnice'])->name('unnice');

    Route::put('/episodes/{id}/toggle-visibility', [EpisodeController::class, 'toggleEpisodeVisibility'])->name('episodes.toggleVisibility');
});

Route::get('contact/create', [ContactController::class, 'create'])
->name('contact.create');

Route::post('contact/store', [ContactController::class, 'store'])
->name('contact.store');

Route::get('sitemap.xml', [SitemapController::class, 'index' ])
->name('get.sitemap');

require __DIR__.'/auth.php';
