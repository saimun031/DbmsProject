<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
     <link rel="stylesheet" href="style.css">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!--JQUERY FILE-->

    <!--Theme CSS FILE-->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CareGiver System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About_Us</a>
      </li>
        
         <li class="nav-item">
        <a class="nav-link" href="Contact.php">Contact</a>
      </li>
        
         <li class="nav-item">
        <a class="nav-link" href="Login.php">Login</a>
      </li>
        
         <li class="nav-item">
        <a class="nav-link" href="user.php">SignUp</a>
      </li>

    </ul>
  </div>
</nav>
    <form method="post" action="login.php">

      <?php include('errors.php'); ?>
      <div class="login-box">
        <h1>Login</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username"> 
      </div>

      <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password">
      </div>
        <div class="textbox">
        <button type="submit" class="btn" name="login_user">Login</button>
        </div>
       <p>
          Not yet a member? <a href="register.php">Sign Up</a>
      </p>
           </div>
    </form>
  </body>
</html>
