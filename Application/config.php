<?php
// define application server hostname
$WEBSITE_DOMAIN_NAME = "team1.cdc.com";
$APPLICATION_HOSTNAME = "192.168.1.76";

// define host, database name, username, and password of SQL database
$DATABASE_IP = "192.168.1.105";
$DATABASE_NAME = "application";
$DATABASE_USERNAME = "root";
$DATABASE_PASSWORD = "cdc";

// error logging
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

// media 
$validMedia = array("video/mp4", "video/ogg", "video/webm");
$validMediaExtensions = array("mp4", "ogg", "webm");
$baseDir = "/var/www";
$mediaDir = "/media";
$uploadDir = "/var/www/media";
?>

