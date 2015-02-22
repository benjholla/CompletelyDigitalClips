<?php
function generateShortName($length = 11) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

$targetDir = "./media/";
if ($_FILES["video"]["name"] == "") {
     $error = "No video imported.";
     echo $error;
  } else {
     if (file_exists($targetDir . $_FILES["video"]["name"])) {
        $error = "The file already exists.";
        echo $error;
     } 
//     else if ($_FILES["video"]["type"] != "video/mp4") {
//        $error = "File format not supported.";
//        echo $_FILES["video"]["type"];
//        echo $error;
//     } 
     else if ($_FILES["video"]["size"] > 26214400) {
        $error = "Only files <= 25ΜΒ.";
        echo $error;
     } else {
        echo $_FILES["video"]["type"];
        echo "Moving file...\n";
        move_uploaded_file($_FILES["video"]["tmp_name"], $targetDir . generateShortName());
        echo "Moved file to: " . $targetDir . generateShortName();
     }
  }
?>