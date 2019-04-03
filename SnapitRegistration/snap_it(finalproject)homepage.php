<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>snap_it!!!(finalproject)homepage</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- logo link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- bootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>

  <body>

    <?php
        if(isset($_POST['googledetails']))
        {
          header('location: ../homepage/google_signin_authentication_page.php');
        }
        if(isset($_POST['Login']))
        {
          header('location: login_registration.php');
        }
     ?>

    <style media="screen">
      .jumbotron{
        margin-top: 20px;
        background-image: url("../Image/snapimg.jpg");
        background-size: cover;
        height: 350px;
      }
      #white{
        font-style: italic;
        color:white;
      }
      #logo{
        font-size: 15px;
      }
      #logo1{
        color: green;
      }
      body{
        background-color: #e0e0d1;
      }
    </style>

      <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light"  style="background-color: #c2c2a3 !important;">
      <a class="navbar-brand" href="snap_it(finalproject)homepage.php"><img class="rounded border border-success" src="../Image/snap_it!!!.jpg" alt="" width="45px" height="45px"><h1 class="lead" id="logo">snapit!!!</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <a id="logo1" class="nav-item nav-link btn btn-outline-success mx-2 my-2 my-sm-0" href="login_registration.php"><i class="fas fa-sign-in-alt"></i>Log in</a>
        <a id="logo1" class="nav-item nav-link btn btn-outline-success my-2 my-sm-0" href="signup_registration.php"><i class="fas fa-user-plus"></i>Sign up</a>
      </div>
      </div>
      </nav>

      <div class="container">
          <div class="jumbotron">
            <h1 id="white">Photo Lover </h1>
            <p id="white">Welcome to your dream world !!</p>
            <p id="white">capture your sweetest moments</p>
            <form action="" method="post">
            <!-- <p class=""><a class="btn btn-primary btn-lg" href="login_registration.php" role="button">Log in now !!!</a></p> -->
            <br><br>
            <button type="submit" name="Login" class="btn btn-primary btn-lg" name="button"><i class="fas fa-sign-in-alt"></i>Log in now !!!</button>
            <button type="submit" name="googledetails" style="background-color:transparent; border-color:transparent;"><img src="../Image/google_signin_logo.png" alt="not found"  height="45px"/></button>
            </form>
      </div>
      </div>

  </body>
</html>
