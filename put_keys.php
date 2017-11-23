<?php

require("connect.php");


if ( !empty($_POST["key"]) && is_array($_POST["key"]) ) {
    foreach ( $_POST["key"] as $key ) {
            $sql = "UPDATE warehouse SET car_key = 1 WHERE id_product = " . $key;
            $mysqli->query($sql);
     }
}
$sql = "UPDATE warehouse SET car_key = 2 WHERE car_key = 0";
$mysqli->query($sql);
header("Location: keys.php");

 ?>
