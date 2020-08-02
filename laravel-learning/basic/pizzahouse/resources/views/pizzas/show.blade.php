@extends('layouts.testLayout')

@section('content')
    
<div class="wrapper pizzas-show">
    <h1>Ordered by: {{ $pizzas->name }} </h1>
    <p class='type'> Type - {{ $pizzas->type }} </p>
    <p class='base'> Base - {{ $pizzas->base }} </p>
    <p class="toppings">Extra toppings:</p>
    <ul>
        @foreach ($pizzas->toppings as $toppings)
            <li> {{ $toppings }} </li>
        @endforeach

    </ul>
    <form action="/pizza_list/{{$pizzas->id}}" method="POST">
        @csrf
        @method('delete')
        <button>Complete order (delete a record)</button>
    </form>
    <a href="/pizza_list" class="back"><- back to all pizzas</a>
</div>

@endsection