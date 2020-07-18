<?php 

    define('VAR1', "123"); // 常數
    $name = 'Eric'; // 字串
    $age = 30;  // int

?>



<!DOCTYPE html>
<html>
<head>
    <title>my first php file</title>
</head>
<body>
    <h1>
        <?php 
            // 會送給瀏覽器，瀏覽器會轉成html
            echo 'hello'; 
            echo 'hello again';

        ?>
    </h1>
    <div>
        <?php 
            // 可以抓上面的變數
            $name = 'Mario';
            echo VAR1; // 不用 $
            echo $name; 
            echo $age;
        ?>
    </div>
</body>
</html>