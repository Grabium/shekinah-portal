<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::delete('/profile/{id}', [ProfileController::class, 'destroyOtherUser'])->middleware(['auth', 'verified'])->name('destroyOtherUser');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::get('panel/albums', function(){echo 'albums';})->name('panel.albums');
    Route::get('panel/highlights', function(){echo 'highlights';})->name('panel.highlights');
    Route::get('panel/carousel', function(){echo 'carousel';})->name('panel.carousel');
    Route::get('panel/events', function(){echo 'events';})->name('panel.events');
});



require __DIR__.'/auth.php';
