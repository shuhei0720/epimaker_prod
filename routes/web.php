<?php

use App\Http\Controllers\Auth\LineController;
use App\Http\Controllers\Auth\TwitterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
    Route::get('episode/myepisode', [EpisodeController::class, 'myepisode'])->name('episode.myepisode');
    Route::get('episode/mycomment', [EpisodeController::class, 'mycomment'])->name('episode.mycomment');
    Route::get('/test', [TestController::class, 'test'])->name('test');
    Route::get('episode/create', [EpisodeController::class, 'create'])->middleware(['auth'])->name('episode.create');
    Route::post('episode', [EpisodeController::class, 'store'])->name('episode.store');
    Route::get('episode', [EpisodeController::class, 'index'])->middleware(['auth'])->name('episode.index');
    Route::get('/ranking', [EpisodeController::class, 'ranking'])->middleware(['auth'])->name('episode.ranking');
    Route::get('episode/show/{episode}', [EpisodeController::class, 'show'])->middleware(['auth'])->name('episode.show');
    Route::get('episode/{episode}/edit', [EpisodeController::class, 'edit'])->middleware(['auth'])->name('episode.edit');
    Route::patch('episode/{episode}', [EpisodeController::class, 'update'])->name('episode.update');
    Route::delete('episode/{episode}', [EpisodeController::class, 'destroy'])->name('episode.destroy');
    Route::post('episode/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    // いいねボタン
    Route::get('/nice/nice/{episode}', [NiceController::class, 'nice'])->name('nice');
    Route::get('/nice/unnice/{episode}', [NiceController::class, 'unnice'])->name('unnice');
    Route::put('/episodes/{id}/toggle-visibility', [EpisodeController::class, 'toggleEpisodeVisibility'])->name('episodes.toggleVisibility');
    Route::get('/manual', function () {
        return view('manual');
    })->name('manual');
    Route::get('/episode/mynice', [EpisodeController::class, 'mynice'])->name('episode.mynice');
});

Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('sitemap.xml', [SitemapController::class, 'index' ])->name('get.sitemap');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::view('/privacy-policy', 'privacy')->name('privacy.policy');
Route::view('/terms-of-service', 'terms')->name('terms.service');

Route::get('auth/line', [LineController::class, 'redirectToLine'])->name('auth.line');
Route::get('auth/line/callback', [LineController::class, 'handleLineCallback']);

Route::get('auth/twitter', [TwitterController::class, 'redirectToTwitter'])->name('auth.twitter');
Route::get('auth/twitter/callback', [TwitterController::class, 'handleTwitterCallback']);

Route::post('/tweet/share', 'TweetController@shareEpisode')->name('tweet.share');



require __DIR__.'/auth.php';