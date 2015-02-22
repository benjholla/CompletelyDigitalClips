<?php

// session utils
include 'sessions.php';

// get POST information from login form
$email=$_POST["email"];
$password=$_POST["password"];

// open connection to the database
include 'config.php';
include 'opendb.php';

// get user data from the users table (assumes users table already exists!)
$result = mysql_query("SELECT * FROM users WHERE email='" . $email . "'" . " AND password=" . "'" . $password . "'");

// authenticate user
$login = mysql_num_rows($result) > 0;

if($login){
  // set an active cookie for this username
  setcookie("PHPSESSID", authenticated_session($email), time()+3600);
  setcookie("user", $email, time()+3600);
  header('Location: /index.php');
} else {
  // logout
  setcookie("PHPSESSID", authenticated_session($email), time()-3600);
  setcookie("user", $email, time()-3600);
  header('Location: /login.php?message=Login%20Failed');
}

// close connection to the database
include 'closedb.php';

?>
