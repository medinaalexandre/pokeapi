<?php

namespace App\Repositories;

use App\Models\Pokemon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PokemonRepository
{
    public function list(): LengthAwarePaginator
    {
        return Pokemon::query()->paginate();
    }
}
