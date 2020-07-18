<?php 
    /* Arrays */

    // index arrays
    $peoplesone = ['one', 'two', 'three'];
    // echo $peoplesone[0];

    $peoplestwo = array('ones', 'twos');
    // echo $peoplestwo[1];

    $ages = ['Yeaa', 20, 30.1];
    // print_r($ages); // 顯示所有陣列值

    $ages[] = 60;   // 增加陣列
    array_push($ages, 70);  // 增加陣列
    // print_r($ages); // 顯示所有陣列值

    // echo count($ages);  // 陣列個數

    $peoples = array_merge($peoplesone, $peoplestwo);
    // print_r($peoples);  // 陣列串接



    // associative arrays
    $dictone = ['key'=>'value', 'mario'=>'orange'];
    echo $dictone['key'];
    // print_r($dictone);

    $dict2 = array('hey'=>'John');
    // print_r($dict2);

    $dict2['people'] = 12;
    print_r($dict2); // 字典增加
    echo count($dict2);
?>



<!DOCTYPE html>
<html>
<head>
    <title>my first php file</title>
</head>
<body>
    
    
</body>
</html>