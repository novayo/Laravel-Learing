<?php 

    $errors = [
        'email' => '',
        'title' => '',
        'ingredients' => '',
    ];

    $email = $title = $ingredients = '';

    // isset()，確認某變數有設定了
    // 因此就可以知道是否有按下submit
    if (isset($_POST['submit'])){

        // check email
        if (empty($_POST['email'])){
            $errors['email'] = 'An email is required <br />';
        }
        else{
            $email = htmlspecialchars($_POST['email']);
            
            // filter_var 是用來過濾str的函數
            // FILTER_VALIDATE_EMAIL是內建用來過濾是否為email的格式
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "email must be a valid email address" . '<br />';
            }
        }

        // check title
        if (empty($_POST['title'])){
            $errors['title'] = 'An title is required <br />';
        }
        else{
            $title = htmlspecialchars($_POST['title']);

            // preg_match() 是用來 用re來過濾 str
            if (!preg_match('/^[a-zA-z\s]+$/', $title)){
                $errors['title'] =  "title must be a valid title" . '<br />';
            }
        }

        // check ingrediets
        if (empty($_POST['ingredients'])){
            $errors['ingredients'] = 'An ingrediets is required <br />';
        }
        else{
            $ingredients = htmlspecialchars($_POST['ingredients']);

            // preg_match() 是用來 用re來過濾 str
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] =  "ingredients must be a valid ingredients" . '<br />';
            }
        }


        
        // 如果 errors 為空 => 表單對了
        if (!array_filter($errors)){
            // Redirect
            header('Location: index.php');
        }
         
    } // end of POST check
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
            <input type="text" name="email" value="<?php echo $email ?>">

            <!-- red-text 就是新增 紅色的警告字 -->
            <div class="red-text"><?php echo $errors['email']; ?></div>

            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php echo $title ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>

            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>

            <!-- 建立 送出按鈕 -->
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>
</html>