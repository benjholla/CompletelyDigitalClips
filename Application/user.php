<?php
  include 'config.php';
  include 'headers.php';

// open connection to the database
include 'opendb.php';

$userID = NULL;
$media = $mediaDir;
$username = $_GET["username"];

try {
    // get clip properties
    $userResult = mysql_query("SELECT id, email FROM users WHERE username='" . $username . "'");

    if(mysql_num_rows($clipResult) == 0){
        $userID = NULL;
    } else {
        $userRow = mysql_fetch_row($userResult);
        $userID = $userRow[0];
        $email = $clipRow[1];

        // get user videos
        $clipsResult = mysql_query("SELECT host, title, shortname, posted, views FROM users WHERE user='" . $userID . "' ORDER BY views DESC, posted DESC");
        while($clipsRow = mysql_fetch_assoc($clipsResult)){
            $host = $clipsRow[0];
            $title = $clipsRow[1];
            $shortname = $clipsRow[2];
            $posted = $clipsRow[3];
            $views = $clipsRow[4];

            echo "$host - $title - $shortname - $posted - $views";
        }
    }
    
  } catch (Exception $e) {
    $userID = NULL;
  }
  exit;
?>


