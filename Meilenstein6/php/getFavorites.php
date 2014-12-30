    <?php

$name = $_GET["favBtn"];




    try {
        require_once ('konfiguration.php');
        $db_link = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);


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

        //Verbindung beenden
      mysql_close($db_link);



?>