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

## [controller](https://www.youtube.com/watch?v=sysR91VZ9C8&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=11)

1. 說明

> laravel專有的class，用來定義各種function
> user有user controller，user會有他自己該有的function
> 

2. 如何建立

`php artisan make:controller 名`
> 檔案在 app/Http/Controllers
> 

3. 如何使用

> 定義好function之後，這些function稱之為==action==
> 在Route使用時放在第二個參數取代function，並用文字取用對應的controller跟action
> 用@取用action

```php=
Route::get('/', 'Controller名@action名');
```

## [mysql](https://www.youtube.com/watch?v=qCMgxDfRKCo&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=12)

1. 安裝

* [點我下載](https://dev.mysql.com/downloads/mysql/)
* 設置環境變數：export PATH=${PATH}:/usr/local/mysql/bin/

2. 步驟
    
* 登入：`mysql -u root -p`
* 創建資料庫：`create database 名;`
* 在==.env==檔案中，更改DB_DATABASE=名

## [migration](https://www.youtube.com/watch?v=074AQVmvvdg&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=13)


1. 說明

> 用於設定 對mysql的操作
> up() => 建立table
> down() => 刪除table

2. 使用

> 在database/migrations內
* 建立：`php artisan make:migration create_pizzas_table`
* 更改要的table
* 插入所有table：`php artisan migrate`
* 重新插入所有table：`php artisan migrate:fresh`

## [more migration](https://www.youtube.com/watch?v=1Zyr-xi4bPk&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=14)

1. 增加新的欄位

> 方法一：直接改動對應的檔案
> 方法二：新增一個migration到對應的db
> 

2. rollback

> 每個操作都有步驟一、二...等
> 這些是在 `php artisan migrate:status` 內的batch做區分
> 而 `php artisan migrate:rollback` 會回到上一個batch
> 

## [eloquent model](https://www.youtube.com/watch?v=iaXtpAYfiy4&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=15)

1. 說明

> 簡單來說，控制mysql指令很麻煩，
> laravel則支援了，用程式碼操作這些指令
> 

2. 使用

* 建立：`php artisan make:model 名`
* 檔案在/app下
* 在要使用到資料庫的地方，寫下 `use App\名`，就可以用這個class了

```php=
// 回傳所有data
$data = 名::all();

// 照順序拿(小到大)
$data = 名::orderBy('name')->get();

// 照順序拿(大到小)
$data = 名::orderBy('name', 'desc')->get();

// 抓取特定一行資料（抓名字是Eric的訂單）
$data = 名::where('name', 'Eric');

// 抓取最後一筆資料（看timestamp，若沒有，timestamp=0）
$data = 名::latest()->get();

// 找尋特定資料 (沒有這個資料會報錯)
$data = 名::find($id);

// 找尋特定資料 (沒有這個資料會出現404)
$data = 名::findOrFail($id);
```

## [view資料夾分類](https://www.youtube.com/watch?v=XygqwWXhcrk&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=16)

1. 分類好不同的view

> 假設檔案路徑為 /view/pizzas/index.blade.php
> 取用 `view('pizzas.index')`
> 

## [拿取資料庫並更新在view內](https://www.youtube.com/watch?v=LkQ7SeLh-DM&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=17)

1. $data = 名::findOrFail($id);

## [建立表單 & send post request](https://www.youtube.com/watch?v=8KCQ5SV3omQ&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=18)

> form 但 action指向/pizza_list
> 雖然 Route::get內已經有這個了，不過這是帶有post的一些資訊回來
> 再來就要再去定義，當get到這個post之後，controller要做出什麼反應
> 

## [handle post request](https://www.youtube.com/watch?v=FZusuCbU7_Q&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=19)


1. 抓取這個post

```php=
// 抓取此post
Route::post('/pizza_list', 'PizzaController@store');

// 抓到之後去controller的store
public function store(){
    // 這邊先回到主頁面
    return redirect('/');
}
```

2. csrf

> 送出表單中，可能會有人去偽造相同的post回去server，這樣就被攻擊了
> 很多框架都會預防這種攻擊，
> 所以這邊如果直接redirect，會被laravel擋下來，出現419 error
> 因此要在form 中加入**@csrf**字樣去預防這個error
> [更多資料](https://blog.techbridge.cc/2017/02/25/csrf-introduction/)
> 

3. 抓取post資料

```php=
$data = request('price'); // 這裡的price是表單的name
```

## [插入資料進資料庫 & redirect資料給別的頁面](https://www.youtube.com/watch?v=7cdXabzIgkI&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=20)

1. 插入進資料庫

```php=
$pizza = new Pizzas(); // model
$pizza->name = request('name');
$pizza->type = request('type');
$pizza->base = request('base');

$pizza->save(); // save into mysql => 應該是繼承model的關係，model好像本先定義要跟mysql互動
```

2. redirect與送參數給它

```php=
return redirect('/')->with('message', 'Thanks for ordering'); // with 是 建立一個session = {'message': 'Thanks for ordering'}

// 取用時，在view內用{{ session('key') }}去呼叫即可
```

## [插入 json 資料](https://www.youtube.com/watch?v=C5g1G6AVdco&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=21)

1. 說明

> 前面都是傳送單筆資料
> 有些資料是json形式傳回，而mysql能夠儲存json格式
> 但是 我們不能直接用json，因此我們可以在model運用**$casts**
> 來讓我們取用此變數時能夠自動將json轉成array
> 

```php=
// 在model中

// 遇到名字是toppings的變數，會自動轉成array格式
protected $casts = [
    'toppings' => 'array'
];
```

## [刪除一筆資料](https://www.youtube.com/watch?v=CVu25TR_dAk&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=22)

1. 自行定義 Route::"這裡"

> 雖然在form中的method只有接受get跟post
> 但我們可以在下面加入@method('名稱')
> 這樣就可以在laravel中使用`Route::名稱`去抓取

2. controller

```php=
// 在web.php中
Route::delete('/pizza_list/{id}', 'PizzaController@delete');

// 在controller中
public function delete($id){
    $pizza = Pizzas::findOrFail($id);
    $pizza->delete();

    return redirect('/pizza_list');
}
```
