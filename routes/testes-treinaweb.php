<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Teste\LiveUpdate;
use App\Livewire\Teste\Home;
use App\Livewire\Teste\Validations;

Route::get('/teste-treinaweb/live-update', LiveUpdate::class)->name('treinaweb.live-update');
Route::get('/teste-treinaweb/home', Home::class)->name('treinaweb.home');
Route::get('/teste-treinaweb/validations', Validations::class)->name('treinaweb.validations');