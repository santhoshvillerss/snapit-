<?php
//Include GP config file
session_start();
include_once 'google_signin_authentication_page.php';

//Unset token and user data from session
unset($_SESSION['token']);
unset($_SESSION['userData']);
unset($_SESSION['username']);

//Reset OAuth access token
$gClient->revokeToken();

//Destroy entire session
session_destroy();

//Redirect to homepage
header("Location:../SnapitRegistration/snap_it(finalproject)homepage.php");
?>
