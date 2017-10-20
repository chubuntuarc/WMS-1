<?php
require("connect.php");
$exit = '';
$id = $_POST['id'];
$client = $_POST['client'];
$comments = $_POST['comments'];
$comment_count = $_POST['comment_count'];
$exit = $_POST['exit'];
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
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
            if(file_exists("upload/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                if($exit == 'on'){
                    $sql = "UPDATE warehouse SET status =  1, exit_date = NOW(), client = '" . $client . "' ,exit_comments = '" . $comments . "', exit_pic = 'upload/" . $_FILES["photo"]["name"] . "' WHERE id_product = " . $id;
                }else{
                    if($comment_count == 1){
                        $sql = "UPDATE warehouse SET comment2 = '" . $comments . "', comment2_date = NOW() ,comment2_pic = 'upload/" . $_FILES["photo"]["name"] . "' WHERE id_product = " . $id;
                    }elseif ($comment_count == 2) {
                        $sql = "UPDATE warehouse SET comment3 = '" . $comments . "', comment3_date = NOW() ,comment3_pic = 'upload/" . $_FILES["photo"]["name"] . "' WHERE id_product = " . $id;
                    }
                }
                $result=$mysqli->query($sql);
                header('Location: detail.php?code='.$id);
                echo "Your file was uploaded successfully.";
            }
        } else{
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
