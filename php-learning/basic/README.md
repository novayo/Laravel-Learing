# [PHP Tuorial](https://www.youtube.com/watch?v=3B-CnezwEeo&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=1)

###### tags: Laravel

## [下載XMAPP](https://www.youtube.com/watch?v=3B-CnezwEeo&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=2)
1. 下載連結：https://www.apachefriends.org/index.html
> 包含 Apache + PHP + MySQL + Perl

2. php會自動跑index.php

3. http://192.168.64.2/dashboard/
> 這裡的dashboard是資料夾

---

## [第一個程式](https://www.youtube.com/watch?v=ABcXbZLm5G8&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=3)

1. 結構

```php
<?php 
    程式碼放中間; // 要加上分號
?>
```

> 也可以直接鑲嵌在html內


2. 程式碼會送給瀏覽器，瀏覽器會轉成html

---

## [變數](https://www.youtube.com/watch?v=2CXme275t9k&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=4)

1. 變數前面加上 $
> string: "" or ''
> > '' 表示 純字串
> > "" 表示 裡面可以加上變數
> 
> int: 30

2. 常數 define('變數名稱', '變數值');
> 取用時 不用$

---

## [字串](https://www.youtube.com/watch?v=U2EliFC9NrQ&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=5)

1. 串接 用.
> echo $string1.$string2;
> 
> echo $string1 . $string2; // 可以有空白

2. 雙引號可以直接用變數，陣列要加上{}
> echo "Hey, $string1";
> 
> echo "Hey, {$string2[0]}"

3. 跳躍符號 \
4. 取用index 
> $string1[0]
5. 常用套件
    * 長度：strlen()
    * 全部轉成大寫：strtoupper()
    * 全部轉成小寫：strtolower()
    * 替換所有特定字母：str_replace('目標', '替換字元', $name);
        * 最後回傳結果

---

## [數字](https://www.youtube.com/watch?v=lT2AvQ17F_w&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=6)

1. 使用
> **(指數)
> 
> ++ --
> 
> $age += 10;

2. 常用套件
    * 無條件捨去：floor($age)
    * 無條件進位：ceil($age)
    * 拿到pi: pi()

---

## [陣列](https://www.youtube.com/watch?v=bWygRxrlD44&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=7)

1. array = list, dict

```php
<?php
    $t1 = [1, 'two', 3.0];
    $t2 = array(2, 'three', 4.0);
    $d1 = ['key'=>value];
    
    $t1[] = 40; // 增加list
    array_push($t2, 50); // 增加list
    $temp = array_pop($t1);    // pop list
    $d1['key2'=>value2]; // 增加dict
    
    echo count($t1); // 個數
    print_r($t2)    // 顯示所有
?>
```

---

## [多維陣列](https://www.youtube.com/watch?v=G1iDSoAXyvM&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=8)

---

## [迴圈](https://www.youtube.com/watch?v=TBUgZ84tTgU&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=9)

```php=
<?php 
    // loops
    $t1 = ['hey', 'my', 'name', 'is', 'eric.'];

    // for
    for ($i=0; $i<count($t1); $i++){
        echo $t1[$i] . '<br />';
    }


    // foreach
    foreach($t1 as $t){
        echo $t . '<br />';
    }

    // while
    $j = 0;
    while ($j < count($t1)){
        echo $t1[$j] . '<br />';
        $j++;
    }
?>
```

---

## [布林](https://www.youtube.com/watch?v=hxYQA-nuIXY&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=10)

1. true, false
> echo true; // 輸出1
> 
> echo false; // 不會輸出

2. == ===
> == 不會比較type，故 echo 5 == '5'; // 會是true
> 
> === 會比較type，故 echo 5 === '5'; // 會是false
 
3. 比較
> == > < != <= >=

4. 字串比較
> ascii去比

---

## [if](https://www.youtube.com/watch?v=E1ms4qpfy78&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=11)

1. 使用

> if (){}
> 
> elseif (){}
> 
> else {}
> 
> && ||

---

## [cotinue && break](https://www.youtube.com/watch?v=sEq6riJ0Do8&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=12)

1. 使用

> break
> 
> continue
> 

---

## [function](https://www.youtube.com/watch?v=438PsnpJj5E&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=13)

1. 使用

```php=
<?php 
    // funcion

    function func($param1 = [0]){
        $param1[0]++;
        return $param1;
    }

    $tmp1 = [0, 1];
    func($tmp1);
    echo "{$tmp1[0]}";



    function func1($param1 = 'Mario'){
        echo "Hi $param1, Google it" . '<br />';
    }
    
    $i = 0;
    func1();
    func1($i);
?>
```

---

## [function more](https://www.youtube.com/watch?v=YCw3z-yEiwQ&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=14)

1. pass by reference

> function func(&$t1){
>
> }

---

## [include & require](https://www.youtube.com/watch?v=Tf6erFtmN-Q&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=15)

1. 使用

```php=
<?php 
    // include
    include('testHeader.php');
    require('testHeader.php');
?>



<!DOCTYPE html>
<html>
<head>
    <title>my first php file</title>
</head>
<body>
    <?php 
        include('testHeaderHtml.php');
        include('testHeaderHtml.php');
        include('testHeaderHtml.php');
     ?>
    
</body>
</html>
```

2. 差別
	* 如果沒有此檔案或套件
	    * include 會繼續執行
	    * require 會終止

---

## [三元運算子](https://www.youtube.com/watch?v=L-S0rsFR-gQ&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=34)

1. Ternary Operator

```php=
$val = $cost > 40 ? "yes" : "No";
```

---

## [SuperGlobal](https://www.youtube.com/watch?v=sMhSKNAHXZ8&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=36&t=0s)

1. Reference

> https://www.php.net/manual/ro/language.variables.superglobals.php

---

## [session - 傳遞資料在不同檔案間](https://www.youtube.com/watch?v=6ZDTUZ1KRUI&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=36)

1. 說明

> 把變數存在 $_SESSION 內，而每個檔案都會有這個SuperGlobal，因此就可以做到傳輸
>

2. 用法

```php=
// 在每個要用到$_SESSION的檔案中，打上session_start();就可以使用此變數
session_start();

// 加入新值
$_SESSION['name'] = "Eric";

// 刪除
unset($_SESSION['name']);

// 刪除所有值
session_unset();

```

---

## [Null Coalescing](https://www.youtube.com/watch?v=8Bsvrm4gHGs&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=37)

1. 如果遇到NULL則給定新值 ??

```php=
$name = $_SESSION['name'] ?? 'Guest';
```

---

## [Cookies](https://www.youtube.com/watch?v=GNGf-I5pNrI&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=38)

1. 說明

> 像是session一樣，只是session是放在軟體中，cookie則是放在他人的電腦中
> 

2. 用法

```php=
// cookie for gender
// 'gender' 是 這個cookie的名字
// $_POST['gender'] 的 gender 是 24行的name
// 現在時間 + 1天 （一天後這個cookie會消失）
setcookie('gender', $_POST['gender'], time() + 86400);

// get cookie
$gender = $_COOKIE['gender'] ?? 'Unknown';
```
---

## [file system](https://www.youtube.com/watch?v=yUzcYBuSgc4&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=39)

1. file 操作

```php=
<?php
    // file system

    $file = 'test.txt';
    if (file_exists($file)){
        // readfile
        echo readfile('test.txt') . '<br />'; // 內容 + bytes (會捨棄換行)

        // copy file
        copy($file, 'test2.txt');

        // rename file
        rename($file, 'testtttt.txt');

        // absolute path
        echo realpath($file) . '<br />';

        // file size
        echo filesize($file) . '<br />';

        // make folder
        mkdir('folder_test');
    }
    else{
        echo "file does not exist.";
    }
?>
```

---

## [file system 2](https://www.youtube.com/watch?v=UT9zKFYr18U&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=40)

1. 操作

```php=
<?php
    // file system 2

    $file = 'test.txt';

    $fp = fopen($file, 'r+');

    // read by bytes
    echo fread($fp, filesize($file)) . '<br />';

    // rewind
    rewind($fp);

    // read by lines
    echo fgets($fp) . '<br />';

    // rewind
    rewind($fp);

    // read by a char
    echo fgetc($fp) . '<br />';

    // rewind
    rewind($fp);

    // write a file（會依照fp位置去做覆蓋）
    fwrite($fp, "\nNew String");

    // close a file
    fclose($fp);

    // delete a file
    unlink($file);
?>
```
---

## [class](https://www.youtube.com/watch?v=bt4znmLQCZ8&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=41)

1. 用法

> 使用變數不用$，$user1->name
> constructor寫法特殊

```php=
<?php
    // class

    class User{
        public $name;
        public $email;

        public function __construct($name, $email){
            $this->name = $name;
            $this->email = $email;
        }

        public function login(){
            echo $this->name . ' logged in.<br />';
            echo $this->email . '<br />';
        }
    }

    $user1 = new User('Eric', 'eric@gmail.com');
    $user2 = new User('Hello', 'hello@gmail.com');

    $user1->login();
    $user2->login();
?>
```

---

## [getter and setter](https://www.youtube.com/watch?v=BUdGWoMMPQs&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=42)

1. 說明

> 將變數設置成private並用函數去控制它們

---

## Reference
1. [如何開啟mac xampp 資料夾](https://stackoverflow.com/questions/45518021/where-to-find-htdocs-in-xampp-mac)