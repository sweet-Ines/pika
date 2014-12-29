<?php

$name=$_GET["Absenden"];

if($name == "Film"){
    require_once ('konfiguration.php');

    //Film
    $filmtitel=$_GET["filmtitel"];
    $regie=$_GET["regie"];
    $drehbuch=$_GET["drehbuch"];
    $filmerscheinungsjahr=$_GET["filmerscheinungsjahr"];
    $schauspieler=$_GET["schauspieler"];
    $filmgenre=$_GET["filmgenre"];


    if(($filmtitel == "") OR ($regie == "") OR ($drehbuch == "") OR ($filmerscheinungsjahr == "") OR ($schauspieler == "") OR ($filmgenre == "")){
        echo "Fehler: Eintrag unvollständig.";
        die;
    }

    //TODO
    //Verbindung herstellen
    $datenbank = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK) or die ("Verbindung fehlgeschlagen: ".mysql_error());
    mysqli_set_charset($datenbank, 'utf8');
   // mysql_select_db("Datenbank-Name") or die ("Datenbank existiert nicht");

    if ( $datenbank )
    {
        echo 'Verbindung erfolgreich: ';
        //print_r( $db_link);

        $abfrage = "SELECT COUNT(FID) FROM FILM";
        $ergebnis = mysql_query($abfrage);
        $menge = mysql_fetch_row($ergebnis);


        //TODO id+1 hinzufügen
        //Daten in DB speichern
        $sql_befehl = mysql_query("INSERT INTO film (Filmtitel, Regie, Drehbuch, Erscheinungsjahr, Schauspieler, Filmgenre) VALUES ('".$_GET["filmtitel"]."','".$_GET["regie"]."','".$_GET["drehbuch"]."','".$_GET["filmerscheinungsjahr"]."','".$_GET["drehbuch"]."','".$_GET["schauspieler"]."','".$_GET["filmgenre"]."')");


        if($sql_befehl)
        { echo "Ihr Eintrag wurde hinzugefügt."; }
    }
    else
    {

        die('Keine Verbindung möglich! ');
    }


//Verbindung beenden
    mysql_close($datenbank);
}

if($name=="music"){

    require_once ('konfiguration.php');

    //Musik
    $interpreter=$_GET["interpreter"];
    $albumtitel=$_GET["albumtitel"];
    $musikerscheinungsjahr=$_GET["musicerscheinungsjahr"];
    $songs=$_GET["songs"];
    $musikgenre=$_GET["musicgenre"];



    if(($interpreter == "") OR ($albumtitel= "") OR ($musikerscheinungsjahr== "") OR ($songs == "") OR ($musikgenre == "")){
        echo "Fehler: Eintrag unvollständig.";
        die;
    }

    //TODO
    //Verbindung herstellen
    $datenbank = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK) or die ("Verbindung fehlgeschlagen: ".mysql_error());
    mysqli_set_charset($datenbank, 'utf8');
   // mysql_select_db("Datenbank-Name") or die ("Datenbank existiert nicht");


    if ( $datenbank )
    {
        echo 'Verbindung erfolgreich: ';
        //print_r( $db_link);

        $abfrage = "SELECT COUNT(Mid) FROM musik";
        $ergebnis = mysql_query($abfrage);
        $menge = mysql_fetch_row($ergebnis);

        //TODO id+1 hinzufügen
        //Daten in DB speichern
        $sql_befehl = mysql_query("INSERT INTO musik (Interpreter, Albumutitel, Erscheinungsjahr, Songs, Musikgenre) VALUES ('".$_GET["interpreter"]."','".$_GET["albumtitel"]."','".$_GET["musicerscheinungsjahr"]."','".$_GET["songs"]."','".$_GET["musicgenre"]."')");


        if($sql_befehl)
        { echo "Ihr Eintrag wurde hinzugefügt."; }
    }
    else
    {

        die('Keine Verbindung möglich! ');
    }
//Verbindung beenden
    mysql_close($datenbank);
}







//Meilenstein 5- Daten in eine txt Datei speichern
/*
 * $name=$_GET["Absenden"];
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

 */




    ?>