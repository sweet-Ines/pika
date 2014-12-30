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

        //$abfrage = "SELECT COUNT(FID) FROM FILM";
        //$ergebnis = mysql_query($abfrage);
        //$menge = mysql_fetch_row($ergebnis);



        //Daten in DB speichern
        $sql_befehl = mysql_query("INSERT INTO FILM (Ftitel, Regie, Drehbuch,  Schauspieler, Erscheinungsjahr, Filmgenre, Drehbuch, fav) VALUES ('".$_GET["filmtitel"]."','".$_GET["regie"]."','".$_GET["schauspieler"]."', '".$_GET["filmerscheinungsjahr"]."','".$_GET["drehbuch"]."')");


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


    //Verbindung herstellen
    $datenbank = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK) or die ("Verbindung fehlgeschlagen: ".mysql_error());
    mysqli_set_charset($datenbank, 'utf8');
   // mysql_select_db("Datenbank-Name") or die ("Datenbank existiert nicht");


    if ( $datenbank )
    {
        echo 'Verbindung erfolgreich: ';
        //print_r( $db_link);


        //Daten in DB speichern
        $sql_befehl = mysql_query("INSERT INTO ALBUM (ATitel, Jahr, Songs, Interpreter, fav) VALUES ('".$_GET["albumtitel"]."','".$_GET["musicerscheinungsjahr"]."','".$_GET["songs"]."','".$_GET["interpreter"]."','".$_GET["musicfavorit"]."')");


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

    ?>