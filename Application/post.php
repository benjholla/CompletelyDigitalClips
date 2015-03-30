<?php
  include 'config.php';
  include 'headers.php';
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

    <title>Completely Digital Clips - Post Video</title>

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
     <h1>Post Video</h1>
     <script>
       $('#video').bind('change', function() {
           if(this.files[0].size > 100*1024*1024){
             alert("Warning this video file is too large!");
           }
       });
     
        function checkPostVideo(){
            if (document.postvideo.title.value.length==0){
                alert("Please enter title!");
                return false;
            }
            if(document.postvideo.description.value.length==0){
                alert("Please enter description!");
                return false;
            }
            if(document.postvideo.video.value.length==0){
                alert("Please select a video to upload!");
                return false;
            }
            return true;
         }
     </script>
     <br />
     <font face="verdana" color="red">
     <?php 
        if(isset($_GET["message"])) {
          echo "<p>Post Failed</p>";
          echo "<p>" . $_GET["message"] . "</p>";
        }
     ?>
     </font>
     <form name=postvideo action="upload.php" method="post" enctype="multipart/form-data" onSubmit="return checkPostVideo();">
       <label for="title">Title</label><br />
       <input type="text" name="title"><br />
       <br />
       <label for="description">Description</label><br />
       <textarea name="description" id="description"></textarea>
       <br />
       <br />
       <label for="video">Video File</label><br />
       <input type="file" name="video" id="video">
       <br />
       <input value="Post" type="submit">
     </form>
     <br />
     <!-- FOOTER -->
     <hr class="featurette-divider">
     <footer>
       <p>&copy; <?php echo date("Y"); ?> Completely Digital Clips &middot; <a href="/privacy.php">Privacy</a> &middot; <a href="/terms.php">Terms</a></p>
      </footer>
    </div>
  </body>
</html>

