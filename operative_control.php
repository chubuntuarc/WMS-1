<?php
$id_operative = $_POST['operative'];
$control = $_POST['control'];
require('connect.php');
$sql = "";
if ($control == "Comenzar") {
    $sql = "UPDATE operative SET status = 0 WHERE id = $id_operative";
}else{
    $sql = "UPDATE operative SET status = 1 WHERE id = $id_operative";
}
$mysqli->query($sql);
header('Location: operative.php');

 ?>
