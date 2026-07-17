<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel', [\App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [\App\Http\Controllers\ArtikelController::class, 'show'])->name('artikel.show');

Route::view('/tentang-kami', 'tentang-kami')->name('tentang-kami');
Route::view('/belajar-sampah', 'belajar-sampah')->name('belajar-sampah');
Route::view('/belajar-3r', 'belajar-3r')->name('belajar-3r');
Route::view('/hukum', 'hukum')->name('hukum');
Route::view('/hukum2', 'hukum2')->name('hukum2');
Route::get('/video-edukasi', function () {
    $videos = \App\Models\Video::latest()->get();
    return view('video', compact('videos'));
})->name('video-edukasi');
Route::view('/kuis', 'kuis')->name('kuis');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('articles', \App\Http\Controllers\ArticleController::class)->except(['show']);
    Route::resource('videos', \App\Http\Controllers\VideoController::class)->except(['show']);
});

require __DIR__.'/auth.php';
