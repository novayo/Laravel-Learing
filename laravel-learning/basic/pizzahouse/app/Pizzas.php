<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{
    //
    protected $casts = [
        'toppings' => 'array'
    ];
}
