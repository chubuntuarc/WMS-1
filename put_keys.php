<?php

require("connect.php");


if ( !empty($_POST["key"]) && is_array($_POST["key"]) ) {
    echo "<ul>";
    foreach ( $_POST["key"] as $key ) {
            $sql = "UPDATE warehouse SET car_key = 1 WHERE id_product = " . $key;
            $mysqli->query($sql);
     }
     echo "</ul>";
}

header("Location: keys.php");

 ?>
