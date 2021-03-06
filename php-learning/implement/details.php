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

    if (isset($_GET['id'])){
        // 為了防範 id 也有控制mysql的語法
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // query string
        $query = "SELECT * FROM pizzas WHERE id = $id";

        // get result
        $result = mysqli_query($conn, $query);

        // fetch
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>
    <div class="container center grey-text">
        <!-- if pizza exists -->
        <?php if($pizza): ?>
            <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
            <p><?php echo date($pizza['created_at']); ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>
        
            <!-- Delete form -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'];?>"></input>
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>
        <?php else: ?>
            <h5>No such pizza exists!</h5>
        <?php endif?>
    </div>
    <?php include('templates/footer.php') ?>
</html>