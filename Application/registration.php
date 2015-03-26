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

    <title>Completely Digital Clips - Register</title>

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
                <li><a href="/login.php">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <div class="container marketing">
     <hr class="featurette-divider">
     <h1>Login</h1>
     <script>
        function checkRegistration(){
            if (document.registration.email.value.length==0){
                alert("Please enter email!");
                return false;
            }
            if(document.registration.password.value.length==0){
                alert("Please enter password!");
                return false;
            }
            if(document.registration.confirm-password.value.length==0){
                alert("Passwords do not match!");
                return false;
            }
            return true;
         }
     </script>
     <br />
     <font face="verdana" color="red">
     <?php 
        if(isset($_GET["message"])) {
          echo "<p>Registration Failed</p>";
          echo "<p>" . $_GET["message"] . "</p>";
        }
     ?>
     </font>
     <form name=registration action="register.php" method="post" onSubmit="return checkRegistration();">
       <label for="email">Email</label><br />
       <input type="email" name="email"><br />
       <br />
       <label for="username">Username (display name)</label><br />
       <input name="username"><br />
       <br />
       <label for="password">Password</label><br />
       <input name="password" type="password"><br />
       <br />
       <label for="confirm-password">Confirm Password</label><br />
       <input name="confirm-password" type="password"><br />
       <br />
       <input value="Register" type="submit">
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

