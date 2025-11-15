<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::delete('/profile/{id}', [ProfileController::class, 'destroyOtherUser'])->middleware(['auth', 'verified'])->name('destroyOtherUser');

//rotas criadas no Brezze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//minhas rotas
Route::middleware('auth')->group(function() {
    Route::get('lw/panel/albums', )->name('lw.panel.albums');
    Route::get('lw/panel/highlights', function(){echo 'highlights';})->name('lw.panel.highlights');
    Route::get('lw/panel/events', function(){echo 'events';})->name('lw.panel.events');
});



require __DIR__.'/carousel.php';
require __DIR__.'/testes-treinaweb.php';
require __DIR__.'/auth.php';
