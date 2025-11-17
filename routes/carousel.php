<?php

use App\Livewire\Panel\Carousel;
use Illuminate\Support\Facades\Route;

//minhas rotas para componentes carousel do livewire
Route::middleware('auth')->group(function() {
    Route::get('lw/panel/carousel/index', Carousel::class)->name('lw.panel.carousel.index');
    Route::post('lw/panel/carousel/store', [Carousel::class, 'store'])->name('lw.panel.carousel.store');
    Route::delete('lw/panel/carousel/delete/{photoName}', [Carousel::class, 'delete'])->name('lw.panel.carousel.delete');
    Route::get('lw/panel/carousel/download/{photoName}', [Carousel::class, 'download'])->name('lw.panel.carousel.download'); 
});