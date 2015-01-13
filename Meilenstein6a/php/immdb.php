<?php
//Verbindung herstellen
require_once('konfiguration.php');
$datenbank = mysqli_connect (
    MYSQL_HOST,
    MYSQL_BENUTZER,
    MYSQL_KENNWORT,
    MYSQL_DATENBANK) or die ("Verbindung fehlgeschlagen: ".mysql_error());
mysqli_set_charset($datenbank, 'utf8');

$name=$_GET["Absenden"];

if($name == "Film"){

    //Film
    $filmtitel=$_GET["filmtitel"];
    $regie=$_GET["regie"];
    $drehbuch=$_GET["drehbuch"];
    $filmerscheinungsjahr=$_GET["filmerscheinungsjahr"];
    $schauspieler=$_GET["schauspieler"];
    $filmgenre=$_GET["filmgenre"];
    if(isset($_GET["filmfavorit"]))
    {
        $fav=1;
    }
    else {$fav=0;}

    if(
        ($filmtitel == "") OR
        ($regie == "") OR
        ($drehbuch == "") OR
        ($filmerscheinungsjahr == "") OR
        ($schauspieler == "") OR
        ($filmgenre == "")){
            echo "Fehler: Eintrag unvollstaendig.";
            die;
    }


    if ( $datenbank )
    {
        echo 'Verbindung erfolgreich:';
       // $sql_befehl = mysqli_query($datenbank,"INSERT INTO FILM (FTitel, Regie, Schauspieler, Erscheinungsjahr, Drehbuch, fav, Genre) VALUES ('".$_GET["filmtitel"]."','".$_GET["regie"]."','".$_GET["schauspieler"]."', '".$_GET["filmerscheinungsjahr"]."','".$_GET["drehbuch"]."','".$_GET["filmgenre"]."')");

        //$sql_test = mysqli_query($datenbank, "SELECT * FROM FILM");
        $sql_befehl = mysqli_query($datenbank, "INSERT INTO film(FTitel, Regie, Schauspieler, Erscheinungsjahr, Drehbuch, fav, Genre) VALUES ('$filmtitel','$regie','$schauspieler','$filmerscheinungsjahr','$drehbuch','$fav','$filmgenre')");

        if($sql_befehl){
            echo "Ihr Eintrag wurde hinzugefuegt.";
        }

    }
    else
    {
        die('Keine Verbindung moeglich! ');
    }



}

if($name=="Album"){

    //Musik
    $interpreter=$_GET["interpreter"];
    $albumtitel=$_GET["albumtitel"];
    $musikerscheinungsjahr=$_GET["musicerscheinungsjahr"];
    $songs=$_GET["songs"];
    $musikgenre=$_GET["musicgenre"];
    if(isset($_GET["musicfavorit"]))
    {
        $fav=1;
    }
    else {$fav=0;}


    if(($interpreter == "") OR ($albumtitel== "") OR ($musikerscheinungsjahr== "") OR ($songs == "") OR ($musikgenre == "")){
        echo "Fehler: Eintrag unvollstaendig.";
        die;
    }

    if ( $datenbank )
    {
        echo 'Verbindung erfolgreich: ';
       // $sql_befehl = mysql_query("INSERT INTO ALBUM (ATitel,Jahr,Songs,Interpreter,fav,Genre) VALUES ('".$_GET["albumtitel"]."','".$_GET["musicerscheinungsjahr"]."','".$_GET["songs"]."','".$_GET["interpreter"]."','".$_GET["musicfavorit"]."','".$_GET["musicgenre"]."')");
        $sql_write = mysqli_query($datenbank, "INSERT INTO album(ATitel, Jahr, Songs, Interpreter, fav, Genre) VALUES ('$albumtitel','$musikerscheinungsjahr','$songs','$interpreter','$fav', '$musikgenre')");

        if($sql_write){
            echo "Ihr Eintrag wurde hinzugefuegt.";
        }
        else{
            echo "Problem!";
        }
    }
    else
    {
        die('Keine Verbindung moeglich! ');
    }

}
//Verbindung beenden
mysqli_close($datenbank);
    ?>