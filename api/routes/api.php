<?php

use App\Http\Controllers\PokemonListController;
use Illuminate\Support\Facades\Route;

Route::get('/api/pokemon', PokemonListController::class);
