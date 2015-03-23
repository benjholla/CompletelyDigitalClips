<?php
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

    <title>Completely Digital Clips - Login</title>

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
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="/index.php">Home</a></li>
                <li><a href="/login.php">Login</a></li>
                <li><a href="/registration.php">Register</a></li>
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
        function checkLogin(){
            if (document.login.email.value.length==0){
                alert("Please enter email!");
                return false;
            }
            if(document.login.password.value.length==0){
                alert("Please enter password!");
                return false;
            }
            return true;
         }
     </script>
     <br />
     <?php 
        if(isset($_GET["message"])) {
          echo $_GET["message"]; 
        }
     ?> 
     <form name=login action="authenticate.php" method="post" onSubmit="return checkLogin();">
       <label for="email">Email</label><br />
       <input type="email" name="email"><br />
       <br />
       <label for="password">Password</label><br />
       <input name="password" type="password"><br />
       <br />
       <input value="Login" type="submit">
     </form>
     <br />
     <center>Remember, never tell anyone your password!</center>
     <!-- FOOTER -->
     <hr class="featurette-divider">
     <footer>
       <p>&copy; <?php echo date("Y"); ?> Completely Digital Clips &middot; <a href="/privacy.php">Privacy</a> &middot; <a href="/terms.php">Terms</a></p>
      </footer>
    </div>
  </body>
</html>

