<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    public $timestamps = false;
    protected $table = 'pokemons';
    protected $primaryKey = 'id';
}
