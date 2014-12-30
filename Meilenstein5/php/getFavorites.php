


     // Meilenstein 5
      if($name=="Musik Favoriten"){
        $jsonData = file_get_contents("..\json\musik.json");
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
     $jsonData = file_get_contents("..\json\film.json");
     $obj = (array) json_decode($jsonData,true);
     $filme = $obj["favoriten"];
     foreach ($filme as $key => $value) {
         echo "<h2>favorite $key</h2>";
         foreach ($value as $k => $v) {
             echo "$k | $v <br />";
         }
     }
 }

?>