<?php


$dir = "test";

if (isset($_POST['upload'])) {
 //  print_r($_FILES["fileToUpload"]["tmp_name"]);die;
    if (move_uploaded_file($dir, "C:\\xampp\htdocs\Advanced PHP\\task1\\\a50.jpg")) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    }
   
}
