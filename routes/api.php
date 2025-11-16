<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Carousel\CarouselPanelController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Rotas para disponibilização futura de uma API.
// //Painel de controle SEGUE O MODELO ABAIXO
// Route::middleware('auth')->group(function() {
//     Route::get('/ctrl/panel/carousel/index', [CarouselPanelController::class, 'index'])->name('api.ctrl.panel.carousel.index');
// });