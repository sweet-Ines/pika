<?php
header('Content-Type: application/json');

$name = $_GET["type"];

    try {
        require_once('konfiguration.php');
        $datenbank = mysqli_connect (
            MYSQL_HOST,
            MYSQL_BENUTZER,
            MYSQL_KENNWORT,
            MYSQL_DATENBANK) or die ("Verbindung fehlgeschlagen: ".mysql_error());
        mysqli_set_charset($datenbank, 'utf8');


        if ($name == "Musik") {

            $sql = "SELECT * FROM ALBUM";
            $result = mysqli_query($datenbank, $sql);
            $albums = array();

            if (!$result) {
                die('Ungültige Abfrage!');
            }
            while($row = mysqli_fetch_assoc($result)){
                $albums[] = $row;
            }

            print json_encode($albums);

            /*
            else{
            //    $rows = array();

                while($row=mysqli_fetch_assoc($result))
                {
              //      $rows[] = $row;


                    $title=$row['Atitel'];
                    $year=$row['Jahr'];
                    $song=$row['Songs'];
                    $inpret=$row['Interpreter'];
                    $mgenre=$row['Genre'];


                    $posts[] = array('Albumtitel'=> $title, 'Erscheinungsjahr'=> $year, 'Songs'=>$song, 'Interpreter'=>&$inpret, 'Genre'=>$mgenre);


                }

                echo json_encode($posts);
               // $response['posts'] = $posts;


            }
            */
        } elseif ($name == "Film") {

            $sql = "SELECT * FROM FILM";
            $result = mysqli_query($datenbank, $sql);
            $filme = array();

            if (!$result) {
                die('Ungültige Abfrage!');
            }
            while($row = mysqli_fetch_assoc($result)){
                $filme[] = $row;
            }

            print json_encode($filme);

            /*
            $sql = "SELECT Ftitel, Regie, Schauspieler, Erscheinungsjahr,  Drehbuch, Genre FROM FILM";


            $response = array();
            $posts = array();
            $result=mysqli_query($db_link, $sql);

            if (!result) {
                die('Ungültige Abfrage!');
            }
            else{

                while($row=mysql_fetch_array($result))
                {

                    $title=$row['Ftitel'];
                    $regie=$row['Regie'];
                    $spieler=$row['Schauspieler'];
                    $fyear=$row['Erscheinungsjahr'];
                    $drehbuch=$row['Drehbuch'];
                    $fgenre=$row['Genre'];


                    $posts[] = array('Filmtitel'=> $title,  'Regie'=>$regie, 'Schauspieler'=>$spieler, 'Erscheinungsjahr'=> $fyear,'Drehbuch'=> $drehbuch,'Genre'=>$fgenre);
                }

                $response['posts'] = $posts;

                $fp = fopen('..\json\filmNeu.json', 'w');
                fwrite($fp, json_encode($response));
                fclose($fp);

            */
        }

    }
    catch (Exception $ex){
        echo $ex=getMessage();
    }

        //Verbindung beenden
      mysqli_close($db_link);



?>