<?php
  include 'config.php';
  include 'headers.php';

  $media = $mediaDir;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title>Completely Digital Clips</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="/static/css/carousel.css" rel="stylesheet">

    <script src="/lib/jquery.js"></script>
    <script src="/lib/mediaelement-and-player.min.js"></script>
    <link rel="stylesheet" href="./lib/mediaelementplayer.css" />
    <script src="/static/js/bootstrap.min.js"></script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Completely Digital Clips</a>
              <?php echo "<!-- Hosted by $APPLICATION_HOSTNAME -->"; ?>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="/index.php">Home</a></li>
                <?php if(isset($_COOKIE["PHPSESSID"])): ?> 
                  <li><a href="/post.php">Post Video</a></li>
                  <li><a href="/logout.php">Logout</a></li>
                <?php else: ?>
                  <li><a href="/login.php">Login</a></li>
                  <li><a href="/registration.php">Register</a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <div class="container marketing">
      <hr class="featurette-divider">
      <center>
        <h1>Trending Videos</h1>
        <table style="width:100%;">
        <?php

        include 'opendb.php';

        $N = 60;
        // get top N trending videos
        $clipsResult = mysql_query("SELECT host, title, shortname, posted, views FROM clips ORDER BY views DESC, posted DESC LIMIT $N");
        if(mysql_num_rows($clipsResult) > 0){
          $counter = 1;
          echo "<tr>";
          while($clipsRow = mysql_fetch_row($clipsResult)){
            $host = $clipsRow[0];
            $title = $clipsRow[1];
            $shortname = $clipsRow[2];
            $posted = $clipsRow[3];
            $views = $clipsRow[4];
            echo "<td align=\"center\"><a href=\"/view.php?video=$shortname\"><h2>$title</h2></a><a href=\"/view.php?video=$shortname\"><img src=\"http://$host$media/$shortname.png\" /></a><p><b>$views views since <i>$posted</i></b></p></td>";
            if($counter == 3){
              echo "</tr><tr>";
              $counter = 1;
            } else {
              $counter = $counter + 1;
            }
          }
          echo "</tr>";
        } else {
          echo "<h1>Coming soon!</h1>";
        }
      ?>
      </table>
      </center>
      <!-- FOOTER -->
      <hr class="featurette-divider">
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; <?php echo date("Y"); ?> Completely Digital Clips &middot; <a href="/privacy.php">Privacy</a> &middot; <a href="/terms.php">Terms</a></p>
      </footer>
    </div>
  </body>
</html>

