<?php

$name=$_GET["Absenden"];

if($name == "Film"){

    //Film
    $filmtitel=$_GET["filmtitel"];
    $regie=$_GET["regie"];
    $drehbuch=$_GET["drehbuch"];
    $filmerscheinungsjahr=$_GET["filmerscheinungsjahr"];
    $schauspieler=$_GET["schauspieler"];
    $filmgenre=$_GET["filmgenre"];
    $fav=$_GET["filmfavorit"];

    if($fav == "on"){
        $fav = 1;
    } else {
        $fav = 0;
    }

    if(
        ($filmtitel == "") OR
        ($regie == "") OR
        ($drehbuch == "") OR
        ($filmerscheinungsjahr == "") OR
        ($schauspieler == "") OR
        ($filmgenre == "")){
            echo "Fehler: Eintrag unvollständig.";
            die;
    }

    //Verbindung herstellen
    require_once('konfiguration.php');
    $datenbank = mysqli_connect (
        MYSQL_HOST,
        MYSQL_BENUTZER,
        MYSQL_KENNWORT,
        MYSQL_DATENBANK) or die ("Verbindung fehlgeschlagen: ".mysql_error());
    mysqli_set_charset($datenbank, 'utf8');


    if ( $datenbank )
    {
        echo 'Verbindung erfolgreich:';
        //$sql_befehl1 = mysql_query("INSERT INTO FILM (Ftitel, Regie, Schauspieler, Erscheinungsjahr, Drehbuch, fav, Genre) VALUES ('".$_GET["filmtitel"]."','".$_GET["regie"]."','".$_GET["schauspieler"]."', '".$_GET["filmerscheinungsjahr"]."','".$_GET["drehbuch"]."','".$_GET["filmgenre"]."')");

        //$sql_test = mysqli_query($datenbank, "SELECT * FROM FILM");
        $sql_write = mysqli_query($datenbank, "INSERT INTO FILM(Ftitel, Regie, Schauspieler, Erscheinungsjahr, Drehbuch, fav, Genre) VALUES ('$filmtitel','$regie','$schauspieler','$filmerscheinungsjahr','$drehbuch','$fav','$drehbuch')");

        if($sql_write){
            echo "Ihr Eintrag wurde hinzugefügt.";
        }
        echo 'hello';
    }
    else
    {
        die('Keine Verbindung möglich! ');
    }


//Verbindung beenden
    mysqli_close($datenbank);
}

if($name=="Album"){

    //Musik
    $interpreter=$_GET["interpreter"];
    $albumtitel=$_GET["albumtitel"];
    $musikerscheinungsjahr=$_GET["musicerscheinungsjahr"];
    $songs=$_GET["songs"];
    $musikgenre=$_GET["musicgenre"];
    $fav=$_GET["musicfavorit"];

    if($fav == "on"){
        $fav = 1;
    } else {
        $fav = 0;
    }


    if(($interpreter == "") OR ($albumtitel= "") OR ($musikerscheinungsjahr== "") OR ($songs == "") OR ($musikgenre == "")){
        echo "Fehler: Eintrag unvollständig.";
        die;
    }


    //Verbindung herstellen
    require_once('konfiguration.php');
    $datenbank = mysqli_connect (
        MYSQL_HOST,
        MYSQL_BENUTZER,
        MYSQL_KENNWORT,
        MYSQL_DATENBANK) or die ("Verbindung fehlgeschlagen: ".mysql_error());
    mysqli_set_charset($datenbank, 'utf8');


    if ( $datenbank )
    {
        echo 'Verbindung erfolgreich: ';
       // $sql_befehl = mysql_query("INSERT INTO ALBUM (ATitel,Jahr,Songs,Interpreter,fav,Genre) VALUES ('".$_GET["albumtitel"]."','".$_GET["musicerscheinungsjahr"]."','".$_GET["songs"]."','".$_GET["interpreter"]."','".$_GET["musicfavorit"]."','".$_GET["musicgenre"]."')");
        $sql_write = mysqli_query($datenbank, "INSERT INTO ALBUM(ATitel, Jahr, Songs, Interpreter, fav, Genre) VALUES ('$albumtitel','$musikerscheinungsjahr','$songs','$interpreter','$fav','Metal')");

        if($sql_write){
            echo "Ihr Eintrag wurde hinzugefügt.";
        }
    }
    else
    {
        die('Keine Verbindung möglich! ');
    }
//Verbindung beenden
    mysqli_close($datenbank);
}

    ?>