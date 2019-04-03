<?php include('Account_registration_database.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- logo link -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<body>

	<style media="screen">
		.loginform{
			margin-top: 20px;
			background-image: url("../Image/login.jpg");
			background-size: cover;
			height: 350px;
		}
		#dark{
			background-color: #003366;
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
	<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid"> -->
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- <a class="navbar-brand" href="Snap_it_!!!_homepage.php"><img src="snap.jpg" class="logo1" alt="logo not found" height="80px"></a>
    </div>
</nav> -->

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light"  style="background-color: #c2c2a3 !important;">
<a class="navbar-brand" href="snap_it(finalproject)homepage.php"><img class="rounded border border-success" src="../Image/snap_it!!!.jpg" alt="" width="45px" height="45px"><h1 class="lead" id="logo">snapit!!!</h1></a>
<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	<div class="navbar-nav ml-auto">
	<a id="logo1" class="nav-item nav-link btn btn-outline-success mx-2 my-2 my-sm-0" href="login_registration.php"><i class="fas fa-sign-in-alt"></i>Log in</a>
	<a id="logo1" class="nav-item nav-link btn btn-outline-success my-2 my-sm-0" href="signup_registration.php"><i class="fas fa-user-plus"></i>Sign up</a>
</div>
</div> -->
</nav>

	<div id="dark" class="header">
		<h2><i class="fas fa-sign-in-alt"></i>  Login</h2>
	</div>

		<form  class="loginform" method="post" action="">

			<?php include('username_error_list.php'); ?>

			<div class="input-group">
				<label id="white">Gmail</label>
				<input type="email" name="email" value="" placeholder="Example@gmail.com">
			</div>
			<!-- <div class="input-group">
				<label>Username</label>
				<input type="text" name="username" value="">
			</div> -->
			<div class="input-group">
				<label id="white">Password</label>
				<input type="password" name="password" value="">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
			<p id="white">
				Not yet a member? <a href="signup_registration.php">Sign up</a>
			</p>
		</form>




</body>
</html>
