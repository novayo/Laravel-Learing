<?php 
    // funcion

    // Global
    $name = 'Eric';

    function func(){
        global $name;
        $name = 'mario';
        echo "Hello $name";
    }

    func();
    echo "$name" . '<br />';;

    // Pass by value
    $i = 0;
    function func1($i){
        $i = 10;
        return $i;
    }
    func1($i);
    echo "$i" . '<br />';

    // Pass by reference
    function func2(&$i){
        $i = 10;
        return $i;
    }
    func2($i);
    echo "$i" . '<br />';
?>



<!DOCTYPE html>
<html>
<head>
    <title>my first php file</title>
</head>
<body>
    
    
</body>
</html>