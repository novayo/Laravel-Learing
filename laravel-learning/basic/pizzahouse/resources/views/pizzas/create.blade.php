@extends('layouts.testLayout')


@section('content')
    <div class="wrapper pizza-create">
        <h1>Create a new pizza.</h1>
        <form action="/pizza_list" method="POST">
            @csrf
            <label for="name">Your name:</label>
            <input type="text" class="text" id="name" name="name">

            <label for="type">Choose a type:</label>
            <select name="type" id="type">
                <option value="chocolate">Chocolate</option>
                <option value="tomato">Tomato</option>
                <option value="ginga">Ginga</option>
            </select>

            <label for="base">Choose a base:</label>
            <select name="base" id="base">
                <option value="garlic">Garlic</option>
                <option value="Water">Water</option>
                <option value="fish">Fish</option>
            </select>
            <fieldset> 
                <label>Extra toppings<br /></label>
                <input type="checkbox" name="toppings[]" value="mushroom">Mushrooms<br />
                <input type="checkbox" name="toppings[]" value="pineapple">Pineapple<br />
                <input type="checkbox" name="toppings[]" value="olive">Olive<br />
                <input type="checkbox" name="toppings[]" value="garlic">Garlic<br />
            </fieldset>
            <input type="submit" value="order pizza">
        </form>
    </div>
@endsection