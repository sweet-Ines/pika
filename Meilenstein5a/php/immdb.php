<?php

    $filename = "music.txt";
    //durchsuche die GET werte nach einem Vorkommen von "film"
    foreach($_GET as $key => $value) {
        $position = strpos($key,"film");
        if ($position !== false) {
            $filename = "film.txt";
            break;
        }
    }
    $handle = fopen($filename, 'a') or die('Cannot open file:  '.$filename);
    $txt = "";
    foreach($_GET as $value) {
        $txt = $txt."$value,";
    }
    fwrite($handle, substr($txt, 0, -1)."\n");
    fclose($handle);

    echo "erfolgreich gespeichert ^_^";
?>