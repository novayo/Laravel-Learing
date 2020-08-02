@extends('layouts.testLayout')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Pizza List
            </div>
            {{-- request --}}
            {{-- <p>Name: {{$name}} Age: {{$age}} </p> --}}
        
            {{-- if --}}
            {{-- @if($price < 5)
                <p><strong>This pizza is less than 5 dollars.</strong></p>
            @elseif ($price > 5)
                <p><strong>This pizza is more than 5 dollars.</strong></p>
            @else
                <p><strong>This pizza equals to 5 dollars.</strong></p>
            @endif --}}

            {{-- unless --}}
            {{-- @unless ($addition != 'caramel')
                <p>It's caramel.</p>
            @endunless --}}

            {{-- php --}}
            {{-- @php
                echo 'This is php statement in blade' . '<br />';
            @endphp --}}

            {{-- for --}}
            {{-- @for ($i = 0; $i < 2; $i++)
                <p> This is for statemet test i = {{$i}} </p>
            @endfor --}}

            {{-- foreach --}}
            @foreach ($pizzas as $p)
                <div>- {{ $p['name'] }} - {{ $p['type'] }} - {{ $p['price'] }} - @foreach($p['toppings'] as $t) {{ $t }} - @endforeach </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection