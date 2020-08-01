# [Laravel 6 Tutorial](https://www.youtube.com/playlist?list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q)

###### tags: `Laravel`

## [安裝laravel](https://www.youtube.com/watch?v=E74_WZpjeKA&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=3&t=0s)

1. Install PHP 7.4 using Homebrew via `brew install php`.
2. Install [Composer](https://getcomposer.org/).
3. 把 composer.phar 移動到 /usr/local/bin/composer，讓我們隨心所欲呼叫Composer`mv composer.phar /usr/local/bin/composer`
4. composer global require "laravel/installer"
5. [安裝Laravel-valet](https://laravel.com/docs/7.x/valet)
    * Install Valet with Composer via `composer global require laravel/valet`.
6. .bash_profile : export PATH="$HOME/.composer/vendor/bin:$PATH"
7. Run the `valet install` command. 
    * [若安裝了oh my zsh可能會遭遇 zsh: command not found](https://medium.com/@hidayatabisena/solving-issues-command-not-found-laravel-valet-install-on-macos-mojave-2a7629759a9f)

8. 測試 `composer -V`
9. 測試 `laravel -V`
10. 測試 `valet -V`

## 建立專案 ＆ 啟動server

1. 在資料夾內，
`laravel new pizzehouse`
> 這樣就建立好 pizzahouse 這個專案了

2. 啟動server
`php artisan serve`
> run server on http://127.0.0.1:8000/
>

## [Routes, Views](https://www.youtube.com/watch?v=xevIxUQ1SH4&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=3)

1. 操作流程

> 一個request近來 -> 看是哪個Route接到之後 -> 做出對應的事件 -> 產生一個對應的View(會編譯view檔案) -> 送回給瀏覽器因而顯示東西
> 

2. 資料夾
> 在`/routes`內的`web.php`是主畫面

```php=
// 當get到 /之後， 會執行 view
Route::get('/', function () {
    return view('welcome');
});
```

> 而welcome在 `resources/views/welcome.blade.php`內
> 程式法會自動找到 此檔案並顯示它
> 

## [用blade在view上取用參數](https://www.youtube.com/watch?v=ub2PdzJqFXg&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=4)

1. 在route中的view()

> view(哪個view, param1...);
> param1 = ['type' => 'chocolate'];

2. 在view中

> 用{{ $type }}取用變數
> 

## [blade basics](https://www.youtube.com/watch?v=pQ2vxa4_f2w&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=5)

1. if

> 用法
> 
    
```php=
@if (判斷式)
    html
@elseif (判斷式)
    html
@else
    html
@endif
```

2. unless

> 用法 (就是unif)
> 

```php=
@unless (判斷式)
    html
@endunless
```

3. php式子

> 用法
> 

```php=
@php
    php statement
@endphp
```

## [more blade](https://www.youtube.com/watch?v=Po1i6BYG84c&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=6)

1. for

> 用法
> 

```php=
@for($i=0; $i<5; $i++)
    html
@endfor
```

2. foreach

> 用法
> 

```php=
@foreach($pizzas as $pizza)
    html
@endforeach
```

3. $loop

> 每個迴圈中都會有一個$loop物件
> 可以取用$loop->index, $loop->first, $loop->last etc.
> 

## [view 框架](https://www.youtube.com/watch?v=a4sjNWEStuM&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=7)

1. extends

> 用法：將定義好的框架引用
> 

```php=
@extends('資料夾.filename'); // 不用.blade.php
```

2. section

> 用法：設定要放在框架的哪裡
> 

```php=
@section('名')
    剩下的html
@endsection
```

3. yield

> 用法：框架要引用section的位置
> 

```php=
@yield('名')
```

## [css & images](https://www.youtube.com/watch?v=LpJqxx5pNUk&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=8)

1. css

> public資料夾 在執行過程中都是root
> 因此可以在之中定義好各種css，再去引用即可
> 

```php=
<link href="/css/main.css" rel="stylesheet">
```

2. image

```php=
<img src="位置" alt="別名">
```

## [Query params](https://www.youtube.com/watch?v=wj_LrWgJioo&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=9)

1. request

> 用request去抓取?後面的參數
> 

```php=
// 如果網址是 http://127.0.0.1:8000/pizza_list?name=Eric&age=22
$name = request('name');
$age = request('age');
```

## [Route params](https://www.youtube.com/watch?v=tMYHo0BknQA&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=10)

1. 解釋

> 去抓取這個router下，後面的router變數
> 

2. 用法

```php=
// 如果網址是 http://127.0.0.1:8000/pizza_list/mario

// 這個id是變數名，記得要用==括弧==刮起來
Route::get('/pizza_list/{id}', function($id){
    return view('details', ['id' => $id]);
});
```