    <?php

$name = $_GET["favBtn"];

/*
 * $sql=mysql_query("select * from Posts limit 20");

$response = array();
$posts = array();
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$title=$row['title'];
$url=$row['url'];

$posts[] = array('title'=> $title, 'url'=> $url);

}

$response['posts'] = $posts;

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
 */


    try {
        require_once ('konfiguration.php');
        $db_link = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);


        if ($name == "Musik Favoriten") {
            $sql = "SELECT ATitel, Jahr, Songs, Interpreter, Genre FROM ALBUM";

            $response = array();
            $posts = array();
            $result = mysqli_query($db_link, $sql);
            if (!$result) {
                die('Ungültige Abfrage!');
            }
            else{

                //$result=mysql_query($sql);
                while($row=mysql_fetch_array($result))
                {

                    $title=$row['Atitel'];
                    $year=$row['Jahr'];
                    $song=$row['Songs'];
                    $inpret=$row['Interpreter'];
                    $mgenre=$row['Genre'];


                    $posts[] = array('Albumtitel'=> $title, 'Erscheinungsjahr'=> $year, 'Songs'=>$song, 'Interpreter'=>&$inpret, 'Genre'=>$mgenre);
                }

                $response['posts'] = $posts;

                $fp = fopen('..\json\musikNeu.json', 'w');
                fwrite($fp, json_encode($response));
                fclose($fp);
            }
        } elseif ($name == "Film Favoriten") {
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
        }
    }
    }
    catch (Exception $ex){
        echo $ex=getMessage();
    }

        //Verbindung beenden
      mysql_close($db_link);



?>