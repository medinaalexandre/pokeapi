<?php

it('can list pokemons', function () {
    $this->get(route('pokemon.list'))
        ->assertOk(200);
});
