<?php
require("connect.php");
// Desactivar toda notificación de error
$location = $_POST['location'];
$description = $_POST['description'];
$person = $_POST['personal'];

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
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){
                // Check whether file exists before uploading it
                if(file_exists("menar/" . $_FILES["photo"]["name"])){
                    echo $_FILES["photo"]["name"] . " is already exists.";
                } else{
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "menar/" . $_FILES["photo"]["name"]);
                    $sql = "INSERT INTO binnacle(description, location, user_id, picture) VALUES('".$description."', ".$location.", ".$person.",'menar/" . $_FILES["photo"]["name"] . "')";
                    $result=$mysqli->query($sql);
                    header('Location: binnacle_post.php?result=ok');
                }
            } else{
                echo "Error: There was a problem uploading your file. Please try again.";
            }
        } else{
            echo "Error: " . $_FILES["photo"]["error"];
        }
    }
    else{
        echo "No cuentas con permiso para registrar en bitácora";
    }
}
?>
