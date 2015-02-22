<?php
// define host, user, and password
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'cdc';

// error logging
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

// media 
$validMedia = array("video/mp4", "video/ogg", "video/webm");
$validMediaExtensions = array("mp4", "ogg", "webm");
$baseDir = "/var/www/html";
$mediaDir = "/media";
$uploadDir = "/var/www/html/media";
?> 
