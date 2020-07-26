<?php 
    // 這兩種都可以連接資料庫 MySQLi or PDO

    include('config/db_connect.php');

    // define query for all pizzas
    // 拿 title, ingredients, id 從 pizzas這個table內
    // *代表全部
    $sql_query = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    // query
    $sql_query_result = mysqli_query($conn, $sql_query);

    // 將拿到的資料 轉成 associated array （dict）
    $pizzas = mysqli_fetch_all($sql_query_result, MYSQLI_ASSOC);

    // 將query的資料移除
    mysqli_free_result($sql_query_result);

    // 關閉連線
    mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>

    <!-- 新增文字 -->
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>
                <!--  -->
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/pizza.svg"  class="pizza">
                        <div class="card-content" center>
                            <h6><?php echo htmlspecialchars($pizza['title']) ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">

                            <!-- 指到 id=多少的 details -->
                            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if(count($pizzas) >= 3): ?>
                <p>There are 3 or more pizzas.</p>
            <?php else: ?>
                <p>There are less than 3 pizzas.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include('templates/footer.php') ?>
</html>