<?php
require("connect.php");
// Desactivar toda notificación de error
$location = $_POST['location'];
$description = $_POST['description'];
$person = $_POST['personal'];
$date = $_POST['event_date'];
$msg="";
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    switch ($person) {
        case 8976:
            $auth = 'ok';
            break;
        case 2786:
            $auth = 'ok';
            break;
        case 7373:
            $auth = 'ok';
            break;
        case 9601:
            $auth = 'ok';
            break;
        case 2876:
            $auth = 'ok';
            break;
        default:
            $auth = 'no';
            break;
    }

    if($auth == 'ok'){

        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $sql = "INSERT INTO diary(description, location, user_id, event_date) VALUES('".$description."', ".$location.", ".$person.",'".$date."')";
            $result=$mysqli->query($sql);
            header('Location: dashboard.php');
        }
    }
    else{
        echo "No cuentas con permiso para registrar eventos";
    }
}
?>
