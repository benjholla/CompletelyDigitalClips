<?php

include 'config.php';
include 'sessions.php';

// open connection to the database
include 'opendb.php';

function generateShortName($length = 11) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

if ($_FILES["video"]["error"] == UPLOAD_ERR_OK) {
  // get and rename file upload
  $shortname = generateShortName();
  $extension = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
  $filename = $shortname . "." . $extension;
  while(file_exists("$uploadDir/$filename")){
    $shortname = generateShortName();
    $filename = $shortname . "." . pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
  }
  move_uploaded_file($_FILES["video"]["tmp_name"], "$uploadDir/$filename");

  // check upload file size is not greater than 100 megabytes
  if($_FILES["video"]["size"] > 12500000) {
    header("Location: /post.php?message=" . urlencode("Only files <= 100 ΜΒ."));
    exit();
  }

  // check upload success
  if(!file_exists("$uploadDir/$filename")){
    header("Location: /post.php?message=" . urlencode("Upload failed."));
    exit();
  }

  // test with: sudo ffmpeg -i "/var/www/media/filename.mp4" -ss 00:00:04 -f image2 -s qvga "/var/www/media/filename.png"
  shell_exec("ffmpeg -i \"$uploadDir/$filename\" -ss 00:00:04 -f image2 -s qvga \"$uploadDir/$shortname.png\"");

  // check file type
  if(in_array($_FILES["video"]["type"], $validMedia) != 1) {
    header("Location: /post.php?message=" . urlencode("File format not supported."));
    exit();
  }

  // check title
  if(!isset($_POST["title"])){
    header("Location: /post.php?message=" . urlencode("Missing title."));
    exit();
  }

  // check description
  if(!isset($_POST["description"])){
    header("Location: /post.php?message=" . urlencode("Missing description."));
    exit();
  }

  // save input fields
  $title = $_POST["title"];
  $description = $_POST["description"];

  // check user authentication
  if(isset($_COOKIE["PHPSESSID"]) && isset($_COOKIE["user"])){
    try {
      $userResult = mysql_query("SELECT id FROM users WHERE email='" . $_COOKIE["user"] . "'");
      $userRow = mysql_fetch_row($userResult);
      $userID = $userRow[0];

      // insert video into clips table
      $insertResult = mysql_query("INSERT INTO clips (host, shortname, title, description, user, extension) VALUES ('$APPLICATION_HOSTNAME', '$shortname', '$title', '$description', '$userID', '$extension')");
      if ($insertResult) {
        // success! view the video
        header("Location: /view.php?video=" . $shortname);
        exit();
      } else {
        header('Location: /post.php?message=' . urlencode(mysql_error($conn)));
        exit();
      }
    } catch (Exception $e) {
      header("Location: /post.php?message=" . urlencode("Error: " . $e));
      exit();
    }
  } else {
    header("Location: /post.php?message=" . urlencode("Unauthenticated user."));
    exit();
  }
} else {
  // file upload failed
  header("Location: /post.php?message=" . urlencode("No video imported."));
  exit();
}
?>

