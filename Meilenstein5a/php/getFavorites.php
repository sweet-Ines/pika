<?php
    header('Content-type: application/json');
    $filename = $_GET['filename'].".json";
    $handle = fopen($filename, 'r') or die('Cannot open file:  '.$filename);
    $data = fread($handle, filesize($filename));
    fclose($handle);
    echo $data;
?>