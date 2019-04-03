<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');

	// if (!isset($_SESSION['username'])) {
	// 	$_SESSION['msg'] = "You must log in first";
	// 	header('location: login_registration.php');
	// }



?>
<!DOCTYPE html>
<html>
<head>

	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../SnapitRegistration/style.css">
	<link rel="stylesheet" type="text/css" href="snapit_members.php">
	<link rel="stylesheet" type="text/css" href="AcceptOrBlock.php">
	<link rel="stylesheet" type="text/css" href="findfriends.php">
	<link rel="stylesheet" type="text/css" href="Myfriends.php">

</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<style media="screen">

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



 input::placeholder {
   color: #c2c2a3!important;
   /* font-size: 1.5em; */
 }


 .search-wrapper {
    position: relative;
}

.search-wrapper i {
    position: absolute;
    top: 10px;
    right: 5px;
		width: 35px;
		height: 38px;
		color: #c2c2a3!important;
}


	</style>


<body>

		<!-- nav bar info -->
		<nav class="navbar  navbar-expand-lg my-0 navbar-light bg-light"  style="background-color: #c2c2a3 !important;">
	  <a class="navbar-brand" href="home_page.php"><img class="rounded border border-success" src="../Image/snap_it!!!.jpg" alt="" width="45px" height="45px"><h1 class="lead" id="logo">snapit!!!</h1></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar3NavAltMarkup" aria-controls="navbar3NavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>


		<!-- collapse -->
		<div class="collapse navbar-collapse " id="navbar3NavAltMarkup">

			<!-- search bar -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script>
				$(document).ready(function(){
					var x = 0;
				    $("#snapit_members").keyup(function(){
				        var snapit_members = $(this).val();
								if(snapit_members.length == 1 && x == 0)
								{
										$(".scroll_bar").toggle();
										x=1;
								}
				        $.ajax({
				        	url:"snapit_members.php",
				        	method:"POST",
				        	data:{snapit_members:snapit_members},
				        	dataType:"text",
				        	success:function(html)
				        	{
				        		$('#availability').html(html);
				        	}
				        });
				    });
				});
		</script>

		<div class="navbar-nav mx-5">
				<div class="search-wrapper">
					<input class="form-control mr-sm-2" style="width:350px!important;" type="text" name="snapit_members" id="snapit_members" value="" placeholder="search">
					<i class="fas fa-search"></i>
				</div>
		</div>
		<!-- search bar scroll display-->
		<style media="screen">

					.scroll_bar{
						background: #E8E8E4;
						position: absolute;
						top: 66px;
						left: 9.4%;
						width: 350px;
						line-height: 30px;
						box-shadow: 0 0 10px rgba(0,0,0,0.5);
						border-top:2px solid #c2c2a3;
						display: none;
						overflow-y: scroll;
						overflow-x:hidden;
					}

					.scroll_bar:before{
						content: "";
						position: absolute;
						top: -28px;
						right: 13px;
						border-left: 12px solid transparent;
						border-right: 12px solid transparent;
						border-top: 14px solid transparent;
						border-bottom: 14px solid #c2c2a3;
						display: none;
					}

					@media screen and (max-width: 992px) {
						.scroll_bar{
							width: 350px;
							top: 125px;
							left: 9.4%;;
						}
					}
		</style>

		<div class="scroll_bar">
			<span class="design" id="availability"></span>
		</div>
		<style media="screen">
		 .scroll_bar
		 {
				background-image: url("../Image/room.jpg");
		 }
		</style>
		<!--search bar scroll display end-->

	   <!-- search bar end-->

		<!-- friend request -->

		<div class="mx-4">
				<script type="text/javascript">
				$(function () {
				$('[data-toggle="tooltip"]').tooltip()
				})
				</script>
			<button class="btn btn-secondary" id="friends_request" data-toggle="tooltip" data-placement="bottom" title="Friend request"><i class="fas fa-user-friends"></i></button>
			<div class="friends_data" style="border-bottom:0px solid #c2c2a3;">
				<ul style="list-style: none!important; border-bottom:2px solid #c2c2a3;">
					<span id="summa"></span>
				</ul>
			 </div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

		<script>
		function myFunction(id) {

				var reference4 = document.getElementById(id);
			  var reference2 = document.getElementById(id).id;
				 var reference1 = id.replace(/Accept/g, "Block");
					var reference3 = document.getElementById(reference1);
					reference4.disabled = true;
				 reference3.disabled = true;
				 var reference2 = id.replace(/Accept/g, "");
				 $.ajax({
					 url:"Acceptrequest.php",
					 method:"POST",
					 data:{reference2:reference2},
					 dataType:"text",
					 // success:function(html)
					 // {
						//  $('#summa').html(html);
					 // }
				 });
		}
		</script>
		<script>
		function myFunction1(id) {

				var reference4 = document.getElementById(id);
			  var reference2 = document.getElementById(id).id;
				 var reference1 = id.replace(/Block/g, "Accept");
				 	var reference3 = document.getElementById(reference1);
         reference4.disabled = true;
				 reference3.disabled = true;
				 var reference2 = id.replace(/Block/g, "");
				// alert(reference2);
				 $.ajax({
					 url:"Blockrequest.php",
					 method:"POST",
					 data:{reference2:reference2},
					 dataType:"text",
				 });
		}
		</script>

		<script>
				$(document).ready(function(){
						$("#friends_request").click(function(){
								$(".friends_data").toggle();
								$.ajax({
									url:"AcceptOrBlock.php",
									method:"POST",
									success:function(html)
									{
										$('#summa').html(html);
									}
								});
						});
				});
		</script>
		<style media="screen">

					.friends_data{
						background: #E8E8E4;
						position: absolute;
						top: 65px;
						right: 42.7%;
						width: 450px;
					  /* height: 10000px; */
						line-height: 40px;
						box-shadow: 0 0 10px rgba(0,0,0,0.5);
						border-top:2px solid #c2c2a3;
						display: none;
						overflow-y: scroll;
					}

					.friends_data:before{
						content: "";
						position: absolute;
						top: -23px;
						right: 2px;

						/* border-left: 12px solid transparent;
						border-right: 12px solid transparent;
						border-top: 14px solid transparent;
						border-bottom: 14px solid #c2c2a3; */

						/* display: none; */
					}

					@media screen and (max-width: 992px) {
						.friends_data{
							width: 450px;
							top: 225px;
							left: 6.4%;
						}

						.friends_data:before{
							content: "";
							position: absolute;
							top: -23px;
							/* left: 6px; */

							/* border-left: 12px solid transparent;
							border-right: 12px solid transparent;
							border-top: 14px solid transparent;
							border-bottom: 14px solid #c2c2a3; */

							/* display: none; */
						}
					}

		</style>
		<!-- friend request -->

		<!-- find friends -->

			<button class="btn btn-secondary" id="friends_request_list" data-toggle="tooltip" data-placement="bottom" title="Find Friend"><i class="far fa-handshake"></i></button>
			<div class="friends_list" style="border-bottom:0px solid #c2c2a3;">
				<ul style="list-style: none!important; border-bottom:2px solid #c2c2a3;">
					<span id="dummy"></span>
				</ul>
			</div>

			 <script>
	 		function myFunction2(id1) {

	 				var findreference1 = document.getElementById(id1);
	 			  var findreference2 = document.getElementById(id1).id;
	        findreference1.disabled = true;
	 				 //alert(findreference2);
	 				 $.ajax({
	 					 url:"friend_request.php",
	 					 method:"POST",
	 					 data:{findreference2:findreference2},
	 					 dataType:"text",
						 // success:function(html)
						 // {
							//  $('#dummy').html(html);
						 // }
	 				 });
	 		}
	 		</script>
			<script>
					$(document).ready(function(){
							$("#friends_request_list").click(function(){
									$(".friends_list").toggle();
									$.ajax({
										url:"findfriends.php",
										method:"POST",
										success:function(html)
										{
											$('#dummy').html(html);
										}
									});
							});
					});
			</script>
			<style media="screen">

						.friends_list{
							background: #E8E8E4;
							position: absolute;
							top: 65px;
							right: 37.2%;
							width: 390px;
						  /* height: 10000px; */
							line-height: 40px;
							box-shadow: 0 0 10px rgba(0,0,0,0.5);
							border-top:2px solid #c2c2a3;
							display: none;
							overflow-y: scroll;
						}

						.friends_list:before{
							content: "";
							position: absolute;
							top: -23px;
							right: 2px;


							/* border-left: 12px solid transparent;
							border-right: 12px solid transparent;
							border-top: 14px solid transparent;
							border-bottom: 14px solid #c2c2a3; */


							/* displfinday: non mx-4e; */
						}

						@media screen and (max-width: 992px) {
							.friends_list{
								width: 390px;
								top: 260px;
								left: 3.0%;
							}

							.friends_list:before{
								content: "";
								position: absolute;
								top: -23px;
								/* left: 6px; */

								/* border-left: 12px solid transparent;
								border-right: 12px solid transparent;
								border-top: 14px solid transparent;
								border-bottom: 14px solid #c2c2a3; */


								/* display: none; */
							}
						}

			</style>
		<!-- find friends end-->

		<!-- My friends-->

		<button class="btn btn-secondary mx-4" id="find_friends_request_list" data-toggle="tooltip" data-placement="bottom" title="My Friend"><i class="far fa-kiss-wink-heart"></i></button>
		<div class="find_friends_list" style="border-bottom:0px solid #c2c2a3;">
			<ul style="list-style: none!important; border-bottom:2px solid #c2c2a3;">
				<span id="rummy"></span>
			</ul>
		</div>

		 <script>
		function myFunction3(id2) {

				var Myfindreference1 = document.getElementById(id2);
				var Myfindreference2 = document.getElementById(id2).id;
				Myfindreference1.disabled = true;
				 //alert(Myfindreference2);
				 $.ajax({
					 url:"Myfriendresult.php",
					 method:"POST",
					 data:{Myfindreference2:Myfindreference2},
					 dataType:"text",
					 // success:function(html)
					 // {
						//  $('#rummy').html(html);
					 // }
				 });
		}
		</script>
		<script>
				$(document).ready(function(){
						$("#find_friends_request_list").click(function(){
								$(".find_friends_list").toggle();
								$.ajax({
									url:"Myfriends.php",
									method:"POST",
									success:function(html)
									{
										$('#rummy').html(html);
									}
								});
						});
				});
		</script>
		<style media="screen">

					.find_friends_list{
						background: #E8E8E4;
						position: absolute;
						top: 65px;
						right: 30.9%;
						width: 400px;
						/* height : 0px;  */
						line-height: 40px;
						box-shadow: 0 0 10px rgba(0,0,0,0.5);
						border-top:2px solid #c2c2a3;
						display: none;
						overflow-y: scroll;
					}

					.find_friends_list:before{
						content: "";
						position: absolute;
						top: -23px;
						right: 2px;


						/* border-left: 12px solid transparent;
						border-right: 12px solid transparent;
						border-top: 14px solid transparent;
						border-bottom: 14px solid #c2c2a3; */


						/* display: none; */
					}

					@media screen and (max-width: 992px) {
						.find_friends_list{
							width: 390px;
							top: 260px;
							left: 3.0%;
						}

						.find_friends_list:before{
							content: "";
							position: absolute;
							top: -23px;
							/* left: 6px; */


							/* border-left: 12px solid transparent;
							border-right: 12px solid transparent;
							border-top: 14px solid transparent;
							border-bottom: 14px solid #c2c2a3; */


							/* display: none; */
						}

					}

		</style>

		<!-- My friends end-->



				<!-- My Block-->

				<button class="btn btn-secondary mx-1" id="block_friends_request_list" data-toggle="tooltip" data-placement="bottom" title="Blocked Friends"><i class="fas fa-user-lock"></i></button>
				<div class="block_friends_list" style="border-bottom:0px solid #c2c2a3;">
					<ul style="list-style: none!important; border-bottom:2px solid #c2c2a3;">
						<span id="summy"></span>
					</ul>
				</div>

				 <script>
				function myFunction4(id3) {

						var Myblockreference1 = document.getElementById(id3);
						var Myblockreference2 = document.getElementById(id3).id;
						Myblockreference1.disabled = true;
						 //alert("hello");
						 $.ajax({
							 url:"Myblockresult.php",
							 method:"POST",
							 data:{Myblockreference2:Myblockreference2},
							 dataType:"text",
							 // success:function(html)
							 // {
								//  $('#summy').html(html);
							 // }
						 });
				}
				</script>
				<script>
						$(document).ready(function(){
								$("#block_friends_request_list").click(function(){
										$(".block_friends_list").toggle();
										$.ajax({
											url:"Myblocks.php",
											method:"POST",
											success:function(html)
											{
												$('#summy').html(html);
											}
										});
								});
						});
				</script>
				<style media="screen">

							.block_friends_list{
								background: #E8E8E4;
								position: absolute;
								top: 65px;
								right: 27.7%;
								width: 430px;
								/* height : 0px;  */
								line-height: 40px;
								box-shadow: 0 0 10px rgba(0,0,0,0.5);
								border-top:2px solid #c2c2a3;
								display: none;
								overflow-y: scroll;
							}

							.block_friends_list:before{
								content: "";
								position: absolute;
								top: -23px;
								right: 2px;


								/* border-left: 12px solid transparent;
								border-right: 12px solid transparent;
								border-top: 14px solid transparent;
								border-bottom: 14px solid #c2c2a3; */


								/* display: none; */
							}

							@media screen and (max-width: 992px) {
								.block_friends_list{
									width: 390px;
									top: 260px;
									left: 3.0%;
								}

								.block_friends_list:before{
									content: "";
									position: absolute;
									top: -23px;
									/* left: 6px; */


									/* border-left: 12px solid transparent;
									border-right: 12px solid transparent;
									border-top: 14px solid transparent;
									border-bottom: 14px solid #c2c2a3; */


									/* display: none; */
								}

							}

				</style>

				<!-- My Block end-->


						<!-- Profile logo -->
						<div class="navbar-nav mx-3">
							<?php
					 	 $tmpemail = $_SESSION['username'];
						 $img = "";
					 	 $query = "SELECT * FROM users WHERE email='$tmpemail' ";
					 	 if(mysqli_query($db, $query))
						 {
						 $result = mysqli_query($db, $query);
					 	 $photo = mysqli_fetch_array($result);
					 	 $img = $photo['profileimg'];
					   }
						 if($img=="")
						 {
							 $img='../images/profile/nophoto.jpg';
						 }
					 	 echo "<button class='btn btn-sm btn-outline-secondary my-2 my-sm-0' type='submit'><img class='border border-secondary rounded-circle' src='$img' style='width:45px;height:45px;'>";
						 echo " ".$_SESSION['username'];
					 	 ?>

						</div>
					  <!-- Profile logo end-->



		<!-- menu items -->
		<div class="navbar-nav ml-auto">
		<a class="nav-item nav-link" href="Profileupdate.php">EditProflie <i class="fas fa-user-edit" title="Editprofile"></i></a>
		<a class="nav-item nav-link" href="logout.php">LogOut <i class="fas fa-sign-out-alt"></i></a>
		</div>
		<!-- menu items end-->
		</div>
		<!-- collapse end-->
		</nav>


		<!-- homepage info -->


		<?php include('Userdp.php') ?>


		<?php include('UploadStatus.php') ?>

		<div class="header">
			<h2>Home Page</h2>
		</div>
		<div class="content">

			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success" >
					<h3>
						<?php
							echo $_SESSION['success'];
							unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>


			<?php  if (isset($_SESSION['username'])) : ?>
				<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<?php endif ?>
		</div>



</body>
</html>
