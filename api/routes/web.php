<?php

use App\Http\Controllers\PokemonListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/pokemon', PokemonListController::class)->name('pokemon.list');
