<?php
session_start();
if($_SESSION["user_id"] != 0){
    $user =$_SESSION["user_id"];
}else{
    $_SESSION["user_id"] = 0;
}
if($_SESSION["user_id"] == 0){
    header("Location: login.php");
}
if($_SESSION["user_id"] == 0){
    header("Location: login.php");
}
switch ($_SESSION["rol"]) {
    case 0:
    $grant = 0;
    break;
    case 1:
    $grant = 1;
    break;
    case 3:
    $grant = 1;
    break;
    case 5:
    header("Location: operative.php");
    break;
    case 7:
    header("Location: binnacle.php");
    break;
    default:
    $grant = 0;
    break;
}
?>
