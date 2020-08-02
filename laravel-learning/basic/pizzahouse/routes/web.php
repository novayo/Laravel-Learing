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


Route::get('/pizza_list', 'PizzaController@index');
Route::post('/pizza_list', 'PizzaController@store');
Route::get('/pizza_list/create', 'PizzaController@create');
Route::get('/pizza_list/{id}', 'PizzaController@show');
Route::delete('/pizza_list/{id}', 'PizzaController@delete');