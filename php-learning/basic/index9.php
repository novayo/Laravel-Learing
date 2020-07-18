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



<!DOCTYPE html>
<html>
<head>
    <title>my first php file</title>
</head>
<body>
    
    
</body>
</html>