<?php


$name=$_GET["Absenden"];
//if($name=="film")

//echo $_POST["FilmAbsenden"];
echo $_GET["drehbuch"];
echo $_GET["filmtitel"];
echo $_GET["Absenden"];


if($name == "Film") {
    echo "hallo";
    $my_file = 'film.txt.txt'; //TODO
    $handle = fopen($my_file, 'w') or die('Cannot open file:  ' . $my_file);

    fwrite($handle, $_GET["filmtitel"]);
    fwrite($handle, ", ");
    fwrite($handle, $_GET["regie"]);
    fwrite($handle, ", ");
    fwrite($handle, $_GET["drehbuch"]);
    fwrite($handle, ", ");
    fwrite($handle, $_GET["filmerscheinungsjahr"]);
    fwrite($handle, ", ");
    fwrite($handle, $_GET["schauspieler"]);
    fwrite($handle, ", ");
    fwrite($handle, $_GET["filmgenre"]);

    fwrite($handle, "\r\n");

    fclose($handle);
}
//}else
if($name=="music")
{
    $my_file = '..\textfiles\music.txt.txt';//TODO
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