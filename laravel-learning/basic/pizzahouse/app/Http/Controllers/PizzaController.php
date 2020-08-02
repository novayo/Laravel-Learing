<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizzas;

class PizzaController extends Controller
{
    public function index(){
        $pizza = [
            'type' => 'chocolate',
            'size' => 'venta',
            'price' => 10,
            'addition' => 'caramel',
        ];
    
        $pizzas = Pizzas::all();
        return view('pizzas.index', ['pizzas' => $pizzas,],
        );
    }

    public function show($id){
        $pizzas = Pizzas::findOrFail($id);
        return view('pizzas.show', ['pizzas' => $pizzas]);
    }

    public function create(){
        return view('pizzas.create');
    }
    
    public function store(){

        $pizza = new Pizzas(); // model
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->price = 30;
        $pizza->toppings = request('toppings'); // 抓取json

        $pizza->save(); // save into mysql => 應該是繼承model的關係，model好像本先定義要跟mysql互動

        return redirect('/')->with('message', 'Thanks for ordering'); // with 是 建立一個session = {'message': 'Thanks for ordering'}
    }

    public function delete($id){
        $pizza = Pizzas::findOrFail($id);
        $pizza->delete();

        return redirect('/pizza_list');
    }
}
