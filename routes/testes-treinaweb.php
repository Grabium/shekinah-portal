<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Teste\LiveUpdate;
use App\Livewire\Teste\Home;


Route::get('/teste-treinaweb/live-update', LiveUpdate::class)->name('treinaweb.live-update');
Route::get('/teste-treinaweb/home', Home::class)->name('treinaweb.home');