<?php

include 'config.php';

function generateShortName($length = 11) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

var_dump($_FILES["video"]);

$validMedia = array("video/mp4", "video/ogg", "video/webm");

$targetDir = "/var/www/html/media";
if ($_FILES["video"]["error"] == UPLOAD_ERR_OK) {

  $filename = generateShortName() . "." . pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
//  while(file_exists("$targetDir/$filename"){
//    $filename = generateShortName() . "." . pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
//  }
  $tmp_name = $_FILES["video"]["tmp_name"];
  move_uploaded_file($tmp_name, "$targetDir/$filename");

  if($_FILES["video"]["size"] > 12500000) {
    header('Location: /post-video.php?message="Only%20files%20<=%20100%20ΜΒ.');
  }

  if(in_array($_FILES["video"]["type"], $validMedia)) {
    header('Location: /post-video.php?message=File%20format%20not%20supported.');
  }
  header('Location: /media');
} else {
  echo "No video imported.";
}
?>
