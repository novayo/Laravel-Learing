<?php
    // file system

    $file = 'test.txt';
    if (file_exists($file)){
        // readfile
        echo readfile('test.txt') . '<br />'; // 內容 + bytes (會捨棄換行)

        // copy file
        copy($file, 'test2.txt');

        // rename file
        rename($file, 'testtttt.txt');

        // absolute path
        echo realpath($file) . '<br />';

        // file size
        echo filesize($file) . '<br />';

        // make folder
        mkdir('folder_test');
    }
    else{
        echo "file does not exist.";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sandbox</title>
</head>
<body>
    
</body>
</html>