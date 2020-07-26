<?php
    // file system 2

    $file = 'test.txt';

    $fp = fopen($file, 'r+');

    // read by bytes
    echo fread($fp, filesize($file)) . '<br />';

    // rewind
    rewind($fp);

    // read by lines
    echo fgets($fp) . '<br />';

    // rewind
    rewind($fp);

    // read by a char
    echo fgetc($fp) . '<br />';

    // rewind
    rewind($fp);

    // write a file（會依照fp位置去做覆蓋）
    fwrite($fp, "\nNew String");

    // close a file
    fclose($fp);

    // delete a file
    unlink($file);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sandbox</title>
</head>
<body>
    
</body>
</html>