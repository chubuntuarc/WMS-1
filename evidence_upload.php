<?php
require("connect.php");
// Desactivar toda notificación de error
$location = $_POST['location'];
$description = $_POST['description'];
$person = $_POST['personal'];
$uploadedfileload="true";
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

        $path = "binnacle/";
        $valid_file_formats = array("jpg", "png", "gif", "bmp","jpeg");
        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
                $name = $_FILES['photo']['name'];
                $size = $_FILES['photo']['size'];
                if(strlen($name)) {
                    list($txt, $ext) = explode(".", $name);
                    if(in_array($ext,$valid_file_formats)) {
                        if($size<(5242880)) {
                            $image_name = $_FILES['photo']['name'];
                            $tmp = $_FILES['photo']['tmp_name'];
                            if(move_uploaded_file($tmp, $path.$image_name)){
                                $sql = "INSERT INTO binnacle(description, location, user_id, picture) VALUES('".$description."', ".$location.", ".$person.",'".$image_name."')";
                                $result=$mysqli->query($sql);
                                header('Location: binnacle_post.php?result=ok');
                            }
                            else
                            echo "Image Upload failed: " . $_FILES["photo"]["error"];
                        }
                        else
                        echo "Image file size maximum 1 MB";
                    }
                    else
                    echo "Invalid file format";
                }
                else
                $sql = "INSERT INTO binnacle(description, location, user_id, picture) VALUES('".$description."', ".$location.", ".$person.",'binnacle/logo.png')";
                $result=$mysqli->query($sql);
                header('Location: binnacle_post.php?result=ok');
        }
    }
    else{
        echo "No cuentas con permiso para registrar en bitácora";
    }
}
?>
