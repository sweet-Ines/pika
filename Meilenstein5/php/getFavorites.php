<?php
/**
 * Created by PhpStorm.
 * User: Ines
 * Date: 12.12.2014
 * Time: 21:22
 */
$id=$_GET['id'];
if($id=="musicfavorite"){
    $string = file_get_contents('C:\xampp\htdocs\WAW\trunk\Meilenstein 2&3\JavaScript\musik.json'); //TODO SON Pfad
}
elseif($id=="moviefavorite"){
    $string = file_get_contents('C:\xampp\htdocs\WAW\trunk\Meilenstein 2&3\JavaScript\film.json'); // TODO JSON Pfad
}


return $string;
?>