    <?php
    require_once ('konfiguration.php');
$name = $_GET["favBtn"];


    $db_link = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);

    try {
        if ($name == "Musik Favoriten") {
            $sql = "SELECT * FROM musik";

            $db_erg = mysqli_query($db_link, $sql);
            if (!$db_erg) {
                die('Ungültige Abfrage!');
            }
        } elseif ($name == "Film Favoriten") {
            $sql = "SELECT * FROM film";

            $db_erg = mysqli_query($db_link, $sql);
            if (!$db_erg) {
                die('Ungültige Abfrage!');
            }

        }
    }
    catch (Exception $ex){
        echo $ex=getMessage();
    }
//    finally{
        //Verbindung beenden
    //    mysql_close($db_link);
   // }

    /*
     * Meilenstein 5
     *  if($name=="Musik Favoriten"){
        $jsonData = file_get_contents("musik.json");
        $obj = (array) json_decode($jsonData,true);
        $alben = $obj["favoriten"];
        foreach ($alben as $key => $value) {
            echo "<h2>favorite $key</h2>";
            foreach ($value as $k => $v) {
                echo "$k | $v <br />";
            }
        }
 }
 elseif($name=="Film Favoriten"){
     $jsonData = file_get_contents("film.json");
     $obj = (array) json_decode($jsonData,true);
     $filme = $obj["favoriten"];
     foreach ($filme as $key => $value) {
         echo "<h2>favorite $key</h2>";
         foreach ($value as $k => $v) {
             echo "$k | $v <br />";
         }
     }
 }
     */
?>