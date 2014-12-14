<?php


$name=$_GET['id'];
if($name=="film")
{
    $my_file = 'C:\xampp\htdocs\WAW\trunk\Meilenstein5\textfiles\film.txt'; //TODO
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

    fwrite($handle,$name["filmtitel"]);
    fwrite($handle,", ");
    fwrite($handle,$name["regie"]);
    fwrite($handle,", ");
    fwrite($handle,$name["drehbuch"]);
    fwrite($handle,", ");
    fwrite($handle,$name["filmerscheinungsjahr"]);
    fwrite($handle,", ");
    fwrite($handle,$name["schauspieler"]);
    fwrite($handle,", ");
    fwrite($handle,$name["filmgenre"]);

    fwrite($handle,"\r\n");

    fclose($handle);

}elseif($name=="music")
{
    $my_file = 'C:\Users\Ines\Documents\IB\WAW\trunk\Meilenstein5\textfiles\music.txt';//TODO
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

    fwrite($handle,$name["interpreter"]);
    fwrite($handle,", ");
    fwrite($handle,$name["albumtitel"]);
    fwrite($handle,", ");
    fwrite($handle,$name["musicerscheinungsjahr"]);
    fwrite($handle,", ");
    fwrite($handle,$name["songs"]);
    fwrite($handle,", ");
    fwrite($handle,", ");
    fwrite($handle,$name["musicgenre"]);

    fwrite($handle,"\r\n");
    fclose($handle);

}





    ?>