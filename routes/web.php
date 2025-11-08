<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Panel\Carousel;
use App\Livewire\Panel\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\Teste\Teste;

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
    Route::get('panel/albums', )->name('panel.albums');
    Route::get('panel/highlights', function(){echo 'highlights';})->name('panel.highlights');
    Route::get('panel/events', function(){echo 'events';})->name('panel.events');
});


Route::middleware('auth')->group(function() {
    Route::get('panel/carousel/index', Carousel::class)->name('panel.carousel.index');
    Route::post('panel/carousel/store', [Carousel::class, 'store'])->name('panel.carousel.store');
    Route::delete('panel/carousel/delete/{photoName}', [Carousel::class, 'delete'])->name('panel.carousel.delete');
    Route::get('panel/carousel/download/{photoName}', [Carousel::class, 'download'])->name('panel.carousel.download');

    
});

Route::get('/lw/teste', Teste::class)->name('lw.teste');



require __DIR__.'/auth.php';
