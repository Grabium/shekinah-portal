<?php

use App\Livewire\Teste\Crud\Fake\Create;
use App\Livewire\Teste\Crud\Fake\Edit;
use App\Livewire\Teste\Crud\Fake\Homelist;
use Illuminate\Support\Facades\Route;
use App\Livewire\Teste\LiveUpdate;
use App\Livewire\Teste\Home;
use App\Livewire\Teste\Validations;

Route::get('/teste-treinaweb/live-update', LiveUpdate::class)->name('treinaweb.live-update');
Route::get('/teste-treinaweb/home', Home::class)->name('treinaweb.home');
Route::get('/teste-treinaweb/validations', Validations::class)->name('treinaweb.validations');


//crud do model Fake em Livewire\Teste\Fake\...
Route::get('/treinaweb/fake/homelist', Homelist::class)->name('fake.homelist');
Route::get('/treinaweb/fake/create', Create::class)->name('fake.create');
Route::get('/treinaweb/fake/{fake}/edit', Edit::class)->name('fake.edit');