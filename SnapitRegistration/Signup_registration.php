<?php include('Account_registration_database.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script>
			$(document).ready(function(){
			    $("#email").keyup(function(){
			        var email = $(this).val();
			        $.ajax({
			        	url:"ajax_username_checking.php",
			        	method:"POST",
			        	data:{email_id:email},
			        	dataType:"text",
			        	success:function(html)
			        	{
			        		$('#availability').html(html);
			        	}
			        });
			    });
			    // $('#email').keyup(function(){
			    //     $('#email').css("background-color", "pink");
			    // });
			});
	</script>



</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<body>

	<style media="screen">
		.signinform{
			margin-top: 20px;
			background-image: url("../Image/login.jpg");
			background-size: cover;
			height: 950px;
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
  <div class="container-fluid">
    <! Brand and toggle get grouped for better mobile display -->
    <!-- <a class="navbar-brand" href="Snap_it_!!!_homepage.php"><img src="snap.jpg" class = "logo1" alt="logo not found" height="80px"></a>
    </div>
</nav> -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light"  style="background-color: #c2c2a3 !important;">
<a class="navbar-brand" href="snap_it(finalproject)homepage.php"><img class="rounded border border-success" src="../Image/snap_it!!!.jpg" alt="" width="45px" height="45px"><h1 class="lead" id="logo">snapit!!!</h1></a>
</nav>




	<div id="dark" class="header">
		<h2><i class="fas fa-user-plus"></i>  Register</h2>
	</div>
	<form class="signinform" method="post" action="">


    <?php include('username_error_list.php'); ?>

		<div class="input-group">
			<label id="white">Firstname</label>
			<input type="text" name="firstname"  value="<?php echo $firstname; ?>" >
		</div>
		<div class="input-group">
			<label id="white">Lastname</label>
			<input type="text" name="lastname"  value="<?php echo $lastname; ?>" >
		</div>
		<div class="input-group">
			<label id="white">Gmail</label>
			<input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Example@gmail.com">
			<span id="availability"></span>
		</div>
		<div class="input-group">
			<label id="white">Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label id="white">Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<label id="white">Date of Birthday</label>
			<input type="date" name="date">
		</div>
		<div >
			<label  id="white">Gender</label><br>
			<input type="radio" name="gender" value="male" checked><label id="white"> Male</label>
		  <input type="radio" name="gender" value="female"><label id="white"> Female</label>
		  <input type="radio" name="gender" value="other"><label id="white"> Other</label>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p id="white">
			Already a member? <a href="login_registration.php">Log in</a>
		</p>
	</form>
</body>
</html>
