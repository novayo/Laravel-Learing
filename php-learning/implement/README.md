# PHP Implement

###### tags: Laravel

## [header & footer](https://www.youtube.com/watch?v=-KUFcX7WLaA&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=16)

> 有些頁面的樣子長得一樣，因此可以先建立header跟footer，要用的時候直接include就好

### index.php
```php=
<?php 

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>
    <?php include('templates/footer.php') ?>
</html>
```

### header.php

```php=
<head>
    <title>Pizza Order System</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!-- 定義 格式 -->
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
    </style>
</head>

<!-- 背景為灰色 且 淡4階 -->
<body class="grey lighten-4"> 

    <!-- 多了 最上面一條（通常放關於我們之類的），背景為白色 且 沒有陰影-->
    <nav class="white z-depth-0"> 

        <!-- div分段落， container是 把東西包在一起-->
        <div class="container">

            <!-- a代表這東西可以按 #代表按了回到本頁 -->
            <!-- brad-logo 是 Materialize的套件（應該是設定字型） -->
            <a href="#" class="brand-logo brand-text">Pizza Order</a>

            <!-- ul表示 無排序的元素，可以包涵<li> <ol> <ul> -->
            <!-- id 表示 變數名稱，所以這裡的"nav-mobile代表整個包起來的名稱" -->
            <!-- right 表示在右邊， hide-on-small-and-down是 Materialize的套件 -->
            <ul id="nav-mobile" class="right hide-on-small-and-down">

                <!-- btn為 按鈕 -->
                <li><a href="#" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    
    </nav> 
    <!--  -->
```

### footer.php

```php=
    <!-- footer用來放網頁內容的置底版權區域 -->
    <!-- 每個 section 代表著不同的區域 -->
    <footer class="section">
        <div class='center grey-text'>Copyright 2020 Pizza Order System</div>
    </footer>

</body>
```

---

## [輸入表單](https://www.youtube.com/watch?v=Ucq4BA-gMO0&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=17)

### header.php
> form 表單也可以去設定 style

```php=
...
    <!-- 定義 格式 -->
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
...
```

### add.php
1. form 表單在使用者輸入完資料後，可以以GET或POST的方式回傳給特定的php檔案進行處理

```php=
<?php 
    // isset()，確認某變數有設定了
    // 因此就可以知道是否有按下submit
    if (isset($_POST['submit'])){
        print_r($_POST);
    }
?>



<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>

    <!-- 加入文字 -->
    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        
        <!-- form 表示 給使用者操作的介面 -->
        <!-- action 表示 後端的檔案 -->
        <!-- method 表示 要POST 或 GET -->
        
        <!-- GET 表示 會以網址方式送出資料到 action的php去做執行，而資料在php中會以字典的方式存下來，由_GET變數去拿 -->
        <!-- 以這裡來說，_GET['email']= 你打的email -->

        <!-- POST 表示 會以隱藏方式送出資料到 action的php去做執行，而資料在php中會以字典的方式存下來，由_POST變數去拿 -->
        <!-- 以這裡來說，_POST['email']= 你打的email -->
        <form  class="white" action="add.php" method="POST">

            <!-- 建立 label -->
            <label>Your Email:</label>

            <!-- 建立 輸入的格子 -->
            <!-- name好像是 到後端的變數名稱 -->
            <input type="text" name="email">

            <label>Pizza Title:</label>
            <input type="text" name="title">

            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients">

            <!-- 建立 送出按鈕 -->
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>
</html>
```

---

## [XSS Attack](https://www.youtube.com/watch?v=EhOcAZJp81s&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=18)

> 回傳回來的資料 都用 htmlspecialchars() 來做使用
> 因為如果回傳回來的資料有包含html的格式的話，就會執行那段指令
> 因此用 htmlspecialchars() 這個函數去過濾資料
> 

* 舉例

```php=
<?php 
    // isset()，確認某變數有設定了
    // 因此就可以知道是否有按下submit
    if (isset($_POST['submit'])){
        print_r(htmlspecialchars($_POST['submit']));
    }
?>
```

---

## [表單送出後 防呆](https://www.youtube.com/watch?v=g7x4JO0YW1s&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=19)

1. 用if去做防呆

2. 舉例

```php=
<?php 
    // isset()，確認某變數有設定了
    // 因此就可以知道是否有按下submit
    if (isset($_POST['submit'])){

        // check email
        if (empty($_POST['email'])){
            echo 'An email is required <br />';
        }
        else{
            echo htmlspecialchars($_POST['email']) . '<br />';
        }

        // check title
        if (empty($_POST['title'])){
            echo 'An title is required <br />';
        }
        else{
            echo htmlspecialchars($_POST['title']) . '<br />';
        }

        // check ingrediets
        if (empty($_POST['ingrediets'])){
            echo 'An ingrediets is required <br />';
        }
        else{
            echo htmlspecialchars($_POST['ingrediets'] . '<br />');
        }
    } // end of POST check
?>
```

---

## [更多防呆](https://www.youtube.com/watch?v=wFiCZHrCFOw&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=20)

1. 用filter_var來過濾email格式

    * filter_var($email, FILTER_VALIDATE_EMAIL)

2. 用preg_match來過濾title、ingredients格式

    * preg_match(regular expression, variable)

3. 舉例

```php=
<?php 
    // isset()，確認某變數有設定了
    // 因此就可以知道是否有按下submit
    if (isset($_POST['submit'])){

        // check email
        if (empty($_POST['email'])){
            echo 'An email is required <br />';
        }
        else{
            $email = $_POST['email'];
            
            // filter_var 是用來過濾str的函數
            // FILTER_VALIDATE_EMAIL是內建用來過濾是否為email的格式
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "email must be a valid email address" . '<br />';
            }
            else{
                echo $email . '<br />';
            }
        }

        // check title
        if (empty($_POST['title'])){
            echo 'An title is required <br />';
        }
        else{
            $title = $_POST['title'];

            // preg_match() 是用來 用re來過濾 str
            if (!preg_match('/^[a-zA-z\s]+$/', $title)){
                echo "title must be a valid title" . '<br />';
            }
            else{
                echo $title . '<br />';
            }
        }

        // check ingrediets
        if (empty($_POST['ingredients'])){
            echo 'An ingrediets is required <br />';
        }
        else{
            $ingredients = $_POST['ingredients'];

            // preg_match() 是用來 用re來過濾 str
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                echo "ingredients must be a valid ingredients" . '<br />';
            }
            else{
                echo $ingredients . '<br />';
            }
        }
    } // end of POST check
?>
```

---

## [顯示錯誤 & 保留文字](https://www.youtube.com/watch?v=firSTs1bEEY&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=21)

1. 顯示錯誤

> 在input底下建立一個分區，用來顯示red-text（警告文字）
> 記得讀取變數是要echo
> 

```php=
<input type="text" name="email" value="<?php echo $email ?>">

<!-- red-text 就是新增 紅色的警告字 -->
<div class="red-text"><?php echo $errors['email']; ?></div>
```

2. 保留文字

> input中的value為初始文字，又因為導向自己，因此變數會保留起來
> 所以只要將之前格式對的變數記錄下來，下次再顯示出來即可

```php=
<input type="text" name="email" value="<?php echo $email ?>">

<!-- red-text 就是新增 紅色的警告字 -->
<div class="red-text"><?php echo $errors['email']; ?></div>
```

---

## [表單對了就跳轉到主畫面](https://www.youtube.com/watch?v=GS2sUveQpU4&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=22)
1. array_filter

> 用於確認是否 errors內有無東西
> 有東西 代表 還是錯誤
> 無東西 代表 表單對了

```php=
if (array_filter($errors)){
    // errors 有東西
}
```

2. redirect

> 跳到對應的php中

```php=
header('Location: index.php');
```

---

## [儲存表單資料到MySQL](https://www.youtube.com/watch?v=N2L9KZo2szY&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=23)


1. MySQL資料格式如下

| id | title | ingredients | email | created_at |
| -------- | -------- | -------- | -------- | -------- |
| 第幾個     | pizza名稱     | 材料     | email     | 何時創建的     |

2. 設置

> 到 http://192.168.64.2/phpmyadmin/
> 
> 建立一個新的sql並設置上述元素，
> 
> id為int，created_at為time stamp
> 
> 剩下的皆為varchar(string)
> 

---

## [php連結mysql](https://www.youtube.com/watch?v=zpTlJ6dtOxA&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=25)

1. 連結

```php=
<?php 
    // 這兩種都可以連接資料庫 MySQLi or PDO

    // connect to database
    // mysqli_connect('hostname', 'username', 'password', 'table名稱')
    $conn = mysqli_connect('localhost', 'eric', 'nova1314', 'pizza_order');

    // check connection
    if (!$conn){
        echo 'Connection to database error: ' . mysqli_connect_error();
    }
?>
```

---

## [抓取資料庫資料](https://www.youtube.com/watch?v=WGuyxGJW9hs&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=26)

> 已經連線後
> 

1. 定義 query (string)
> 拿 title, ingredients, id 從 pizzas這個table內 用 created_at 排序
> 
> $sql_query = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
> 

2. 從 mysql 拿資料（回傳 mysqli的資料型態）
> mysqli_query(從哪個connection, 定義的query);
> 
> $sql_query_result = mysqli_query($conn, $sql_query);
> 

3. 將資料轉成 dict (此時已經取得 dict 資料 $pizzas) 
> mysqli_fetch_all(資料, 轉成的型態)
> 
> $pizzas = mysqli_fetch_all($sql_query_result, MYSQLI_ASSOC);
> 

4. free 第二點的變數
> mysqli_free_result($sql_query_result);
> 

5. 關閉連線
> mysqli_close($conn);
> 

---

## [顯示 pizza 資料](https://www.youtube.com/watch?v=3T8bp9DlypU&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=27)

1. 顯示

```htmlmixed=
    <!-- 新增文字 -->
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <!-- 橫向排序 -->
        <div class="row">
            <?php foreach($pizzas as $pizza){ ?>
                <!-- 縱向排序 -->
                <div class="col s6 md3">
                    <!-- 每格都是一個card -->
                    <div class="card z-depth-0">
                        <!-- card 內顯示 資料 -->
                        <div class="card-content" center>
                            <h6><?php echo htmlspecialchars($pizza['title']) ?></h6>
                            <div><?php echo htmlspecialchars($pizza['ingredients']) ?></div>
                        </div>
                        <!-- card 內 下方 顯示一個可以按的文字 -->
                        <div class="card-action right-align">
                            <a href="#" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
```
---

## [裁切材料成array(explode funciton)](https://www.youtube.com/watch?v=wT5CVoOdLlE&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=28)

1. explode

> Parse string as dict (numbers => string)
> 
> $arr = explode(',', $string); // $string = "123, 456, 789";
> 
> $arr = {0: "123", 1: "456", 2:"789"};

---

## [endif endforeach](https://www.youtube.com/watch?v=1Py5GjnnreE&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=29)

1. 讓排版更漂亮

```php=
// if 可以寫成這樣
if ():
    // do-something
else if():
    // do-something
else:
    // do-something
endif;

// foreach可以寫成這樣
foreach():
    // do-something
endforeach;
```

---

## [儲存資料到 mysql](https://www.youtube.com/watch?v=ijHc_3t2arE&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=30)

1. mysqli_real_escape_string

> 防止有 操作mysql的字串產生

```php=
// mysqli_real_escape_string(連結的資料庫, 字串);
$email = mysqli_real_escape_string($conn, $_POST['email']);
```

2. 定義 query string

```php=
// 插入 pizzas_table(內的col) 值是 '變數'
// 要加上''，因為要變數內容要轉成字串
$query_string = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients')";
```

3. query

```php=
// mysqli_query(連結的資料庫, query字串)
if (mysqli_query($conn, $query_string)){
    // 如果成功
} else{
    // 如果失敗
}
```

---

## [顯示pizza資料](https://www.youtube.com/watch?v=G8OYy-y3C9A&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=31)

1. 點more info時抓取特定pizza的資料

```htmlmixed=
<!-- 跳到details.php 並用 _GET 去 抓取後綴資料 -->
<!-- id=變數內的id -->
<!-- "details.php?id=<?php echo $pizza['id'] ?>" -->
<a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
```

2. details.php 要去抓取特定 id

```php
if (isset($_GET['id'])){
    // 為了防範 id 也有控制mysql的語法
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // query string
    // WHERE 去抓取特定id的資料
    $query = "SELECT * FROM pizzas WHERE id = $id";
    
    // get result
    $result = mysqli_query($conn, $query);

    // fetch
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}
```

3. html顯示

```htmlmixed=
<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>
    <div class="container center">
        <!-- if pizza exists -->
        <?php if($pizza): ?>
            <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
            <p><?php echo date($pizza['created_at']); ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>
        <?php else: ?>
            <h5>No such pizza exists!</h5>
        <?php endif?>
    </div>
    <?php include('templates/footer.php') ?>
</html>
```

---

## [刪除一個資料](https://www.youtube.com/watch?v=3lpPfEdU-8A&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=32)

1. 創造button去刪除

```htmlmixed=
<!-- Delete form -->
<form action="details.php" method="POST">
    <!-- 建立一個變數給_POST[id_to_delete]=$id -->
    <!-- hidden 表示我們看不到這個表單 -->
    <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'];?>"></input>
    
    <!-- button -->
    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
</form>
```

2. 在 detail.php 內要去偵測是否有POST 並刪除對應資料到mysql內

```php=
<?php
    include('config/db_connect.php');

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        
        // query string
        // 刪除一個id的值
        $query = "DELETE FROM pizzas WHERE id=$id_to_delete";

        // query
        if (mysqli_query($conn, $query)){

            // Redirect
            header('Location: index.php');
        }
        else{
            echo 'query error: ' . mysqli_error;
        }
    }
?>
```
--- 

## [加入圖片](https://www.youtube.com/watch?v=vkH5WZ-4ngU&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=33)

1. index.php

```htmlmixed=
<img src="img/pizza.svg"  class="pizza">
```

2. 定義pizza class

```htmlmixed=
<style type="text/css">
    .pizza{
        width: 100px;
        margin: 40px auto -30px;
        display: block;
        position: relative;
        top: -30px;
    }
</style>
```
---

## Reference
1. [mac xampp phpmyadmin開啟方法](https://yijile.com/log/592.html)