<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pizza_list', function () {
    $pizza = [
        'type' => 'chocolate',
        'size' => 'venta',
        'price' => 10,
        'addition' => 'caramel',
    ];

    $pizzas = [
        ['name' => 'Eric', 'type' => 'chocolate', 'size' => 'small', 'price' => 5],
        ['name' => 'Lisa', 'type' => 'tomato', 'size' => 'grenda', 'price' => 10],
        ['name' => 'Amanda', 'type' => 'pinapple', 'size' => 'venta', 'price' => 20],
    ];
    return view(
        'pizza_list', 
        $pizza,
        [
        'pizzas' => $pizzas,
        'name'   => request('name'),
        'age'    => request('age'),
        ],
    );
});

Route::get('/pizza_list/{id}', function($id){
    return view('details', ['id' => $id]);
});