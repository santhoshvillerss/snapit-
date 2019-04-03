<?php
//Include GP config file && User class
include_once 'google_authentication.php';
include_once 'google++_login_database.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();

	//Initialize User class
	$user = new User();

	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);

	//Storing user data into session
	$_SESSION['userData'] = $userData;

	//Render facebook profile data
    if(!empty($userData)){
        // $output = '<h1>Google+ Profile Details </h1>';
        // $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        // $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        // $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        // $output .= '<br/>Email : ' . $userData['email'];
        // $output .= '<br/>Gender : ' . $userData['gender'];
        // $output .= '<br/>Locale : ' . $userData['locale'];
        // $output .= '<br/>Logged in with : Google';
        // $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        // $output .= '<br/>Logout from <a href="logout.php">Google</a>';
				$email = $userData['email'];
				// $email = str_replace("@gmail.com", "", $email);
				$_SESSION['username'] = $email;
				$_SESSION['success'] = "You are now logged in";



				// add to database

				//declaration
				$firstname = $userData['first_name'];
				$lastname = $userData['last_name'];
				$password = "";
				$date = $userData['date'];
				$nophoto = "../images/profile/nophoto.jpg";
				$gender = $userData['gender'];
				$source = "gmail";
				//declaration



				$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
				$query = "SELECT * FROM users WHERE email='$email' ";
				$results = mysqli_query($db, $query);
				if (mysqli_num_rows($results) != 1)
				{


					$folder = "../images/posted/".$email;
					mkdir ($folder, 0755);
					$createfile = "../images/posted/".$email."/".$email.".txt";
					$myfile = fopen($createfile, "w");
					fclose($myfile);



					$query = "INSERT INTO users (firstname, lastname, email, password, date, profileimg, gender, source)
								VALUES('$firstname','$lastname', '$email', '$password', '$date', '$nophoto', '$gender', '$source')";
					mysqli_query($db, $query);
			  }


				// add to database

				header('location:home_page.php');
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="../Image/google_signin_logo.png" alt="" height="45px" /></a>';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Google using PHP by CodexWorld</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>


<body>

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
	</style>

	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light"  style="background-color: #c2c2a3 !important;">
	<a class="navbar-brand" href="../SnapitRegistration/snap_it(finalproject)homepage.php"><img class="rounded border border-success" src="../Image/snap_it!!!.jpg" alt="" width="45px" height="45px"><h1 class="lead" id="logo">snapit!!!</h1></a>
	</nav>


  <div class="container">
    <div class="jumbotron">
      <center><h1>Google-signin!!!</h1></center>
      <p>A Google Account is a user account that is required for access, authentication and authorization to certain online Google services, including Gmail, Google+, Google Hangouts and Blogger. A wide variety of Google products do not require an account, including Google Search, YouTube, Google Books, Google Finance and Google Maps. However, an account is needed for uploading videos to YouTube and for making edits in Google Maps.After a Google Account is created, the owner may selectively enable or disable various Google applications.YouTube and Blogger maintain separate accounts for users who registered with the services before the Google acquisition. However, effective April 2011 YouTube users are required to link to a separate Google Account if they wish to continue to log into that service.Google Account users may create a publicly accessible Google profile, to configure their presentation on Google products to other Google users. A Google profile can be linked to a user's profiles on various social-networking and image-hosting sites, as well as user blogs.Third-party service providers may implement service authentication for Google Account holders via the Google Account mechanism.</p>
     <!-- <center><a href="https://www.google.com"><img src="google_signin_logo.png" alt="not found"  height="45px"/></a></center> -->
     <center><div><?php echo $output; ?></div></center>
    </div>
  </div>
</body>
</html>
