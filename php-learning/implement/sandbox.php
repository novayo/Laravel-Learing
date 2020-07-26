<?php
    // 三元運算子 SuperGlobal session Null_Coalescing Cookies
    if(isset($_POST['submit'])){

        // cookie for gender
        // 'gender' 是 這個cookie的名字
        // $_POST['gender'] 的 gender 是 24行的name
        // 現在時間 + 1天 （一天後這個cookie會消失）
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        echo $_SESSION['name'];
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sandbox</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="name">
        <select name="gender" method="POST">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>