<?php

include 'headers.php';
include 'sessions.php';
include 'config.php';

// get POST information from login form
$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];

// open connection to the database
include 'opendb.php';

// get user data from the users table
$result = mysql_query("INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')");

// register user
if ($result) {
    // successfully created user, set an active cookie for this username
    setcookie("PHPSESSID", authenticated_session($email), time()+3600);
    setcookie("user", $email, time()+3600);
    header('Location: /index.php');
} else {
    header('Location: /registration.php?message=' . urlencode(mysql_error($conn)));
}

// close connection to the database
include 'closedb.php';

?>
