<?php
    // connect to database
    // mysqli_connect('hostname', 'username', 'password', 'table名稱')
    $conn = mysqli_connect('localhost', 'eric', 'nova1314', 'pizza_order');

    // check connection
    if (!$conn){
        echo 'Connection to database error: ' . mysqli_connect_error();
    }
?>