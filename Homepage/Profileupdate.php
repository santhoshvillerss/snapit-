<?php
include('../SnapitRegistration/Account_registration_database.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="../SnapitRegistration/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script>
			$(document).ready(function(){
			    $("#email").keyup(function(){
			        var email = $(this).val();
			        $.ajax({
			        	url:"../SnapitRegistration/ajax_username_checking.php",
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
<a class="navbar-brand" href="home_page.php"><i class="fas fa-undo"></i><h1 class="lead" id="logo"><strong>BACK</strong></h1></a>
</nav>




	<div id="dark" class="header">
		<h2><i class="fas fa-user-plus"></i>  Register</h2>
	</div>
	<form class="signinform" method="post" action="" enctype="multipart/form-data">


     <?php include('../SnapitRegistration/username_error_list.php'); ?>


    <div class="input-group">
			<label id="white">Profile Photo</label>
			<div class="mx-auto">
				<?php

				$tmpemail = $_SESSION['username'];
				$img = "";
        $db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
				// $photo = '../images/profile/nophoto.jpg';
				$query = "SELECT * FROM users WHERE email='$tmpemail' ";
				$result = mysqli_query($db, $query);
				$photo = mysqli_fetch_array($result);
        $img = $photo['profileimg'];
				if($img=="")
		 	 {
		 		 $img='../images/profile/nophoto.jpg';
		 	 }
				echo "<img src='$img' style='width:100px;height:100px;'><br>";
        ?>
			</div>
			 <input name="file" value="" type="file" style="border-color: #003366!important;" class="my-2" id="white" >
			 <input type="submit" name="submit" value="upload"class="my-2" id="white" style="width: 25%!important; background-color: #003366 !important;">
			 <?php
          if (isset($_POST['submit']))
					{

					// echo "string";

					$file = $_FILES['file'];

					//print_r($file);
					$filename = $file['name'];
					$fileTmpName = $file['tmp_name'];
					$fileSize = $file['size'];
					$fileerror = $file['error'];
					$filetype = $file['type'];

					$fileExt = explode('.',$filename);
					try{
							 $fileActualExt = strtolower(end($fileExt));
					 } catch(Exception $e){
							 echo $e->getMessage();
					 }

					$allowed = array('jpg','jpeg','png','pdf');

					if(in_array($fileActualExt,$allowed)){
							 if($fileerror == 0)
							 {
									if($fileSize < 10000000)
									{
												$tmpemail = $_SESSION['username'];
					              echo $tmpemail;
												$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
											 // $fileNameNew = uniqid('',true).".".$fileActualExt;
											 $fileNameNew = $tmpemail.".".$fileActualExt;
											 $fileDestination = '../images/profile/'.$fileNameNew;
											 $query = "UPDATE users SET profileimg='$fileDestination' WHERE email='$tmpemail'";
							 				 mysqli_query($db, $query);
											 move_uploaded_file($fileTmpName,$fileDestination);
											 {
												 header("location:Profileupdate.php?uploadsuccess");
												}
									}
									else {
									  echo "Your file is too big!";
									}
							 }
							 else {
								 echo "There was an error uploading your file!";
							 }
					}
					else {
						echo "You cannot upload files of this type";
					}
					}

			  ?>
			</div>
			<!-- </div> -->
		<div class="input-group">
			<label id="white">Firstname</label>
			<input type="text" name="savefirstname"  value="<?php echo $firstname; ?>" >
		</div>
		<div class="input-group">
			<label id="white">Lastname</label>
			<input type="text" name="savelastname"  value="<?php echo $lastname; ?>" >
		</div>
		<div class="input-group">
			<label id="white">Gmail</label>
			<input type="email" name="saveemail" id="email" value="<?php echo $email; ?>" placeholder="Example@gmail.com">
			<span id="availability"></span>
		</div>
		<div class="input-group">
			<label id="white">Password</label>
			<input type="password" name="savepassword_1">
		</div>
		<div class="input-group">
			<label id="white">Confirm password</label>
			<input type="password" name="savepassword_2">
		</div>
		<div class="input-group">
			<label id="white">Date of Birthday</label>
			<input type="date" name="savedate">
		</div>
		<!-- <div >
			<label id="white">Gender</label><br>
			<input type="radio" name="gender" value="male"><label id="white"> Male</label>
		  <input type="radio" name="gender" value="female"><label id="white"> Female</label>
		  <input type="radio" name="gender" value="other"><label id="white"> Other</label>
		</div> -->
		<div class="input-group">
			<button type="submit" class="btn" name="save_user">Save</button>
		</div>
		<!-- <p id="white">
			Already a member? <a href="login_registration.php">Log in</a>
		</p> -->
	</form>
</body>
</html>


<?php
// if(isset($_POST['update_profileimg'])){
// $file = $_FILES['file'];
//
// // print_r($file);
// $filename = $file['name'];
// $fileTmpName = $file['tmp_name'];
// $fileSize = $file['size'];
// $fileerror = $file['error'];
// $filetype = $file['type'];
//
// $fileExt = explode('.',$filename);
// try{
// 		 $fileActualExt = strtolower(end($fileExt));
//  } catch(Exception $e){
// 		 echo $e->getMessage();
//  }
//
// $allowed = array('jpg','jpeg','png','pdf');
//
// if(in_array($fileActualExt,$allowed)){
// 		 if($fileerror === 0)
// 		 {
// 				if($fileSize < 10000000)
// 				{
// 							$tmpemail = $_SESSION['username'];
// 							$db = mysqli_connect('localhost', 'root', '', 'registration');
// 						 // $fileupload = addslashes(file_get_contents($fileTmpName));
// 						 // $query = "INSERT INTO images (images) VALUES ('$fileupload')";
// 						 // if(mysqli_query($connect,$query))
// 						 // {
// 							//  echo '<script>alert("image inserted into database")</script>';
// 							//  header("location:homepage.php");
// 						 // }
// 						 $fileNameNew = uniqid('',true).".".$fileActualExt;
// 						 // $fileDestination = 'uploads/'.$fileNameNew;
// 						 $fileDestination = '../images/profile/'.$fileNameNew;
// 						 $query = "UPDATE users SET profileimg='$fileDestination' WHERE email='$tmpemail'";
// 		 				 mysqli_query($db, $query);
// 						 move_uploaded_file($fileTmpName,$fileDestination);
// 						 {
// 							 header("location:demo.php?uploadsuccess");
// 							}
// 				}
// 				else {
// 				  echo "Your file is too big!";
// 				}
// 		 }
// 		 else {
// 			 echo "There was an error uploading your file!";
// 		 }
// }
// else {
// 	echo "You cannot upload files of this type";
// }
// }
?>
