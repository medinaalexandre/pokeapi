<?php

namespace App\Http\Controllers;

use App\Repositories\PokemonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PokemonListController extends Controller
{
    public function __invoke(Request $request, PokemonRepository $repository): JsonResponse
    {
        return response()->json(
            $repository->list()
        );
    }
}
