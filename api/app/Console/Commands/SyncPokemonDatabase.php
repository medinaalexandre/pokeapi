<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncPokemonDatabase extends Command
{
    public const BASE_URI = 'https://pokeapi.co/api/v2/';

    protected $signature = 'app:sync-pokemon-database';

    protected $description = 'Command description';

    public function handle(): void
    {
        $pokemons = Http::get(self::BASE_URI . '/pokemon?limit=500');

        if (!$pokemons->successful()) {
            $this->error('Failed to interact with poke api');
            return;
        }

        foreach ($pokemons->json()['results'] as $pokemon) {
            $poke = new Pokemon();
            $poke->name = $pokemon['name'];


            $details = Http::get($pokemon['url'])->json();
            $poke->weight = $details['weight'] / 10; // Convert from hec to kg
            $poke->height = $details['height'] / 10; // Convert from dec to cm
            $poke->types = implode(',', array_map(function ($type) {
                return $type['type']['name'];
            }, $details['types']));

            $poke->save();
        }
    }
}
