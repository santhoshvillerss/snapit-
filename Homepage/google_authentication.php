<?php
session_start();

//Include Google client library
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '713652518197-lio0oon9oidqdu5q00fgqesvbq9u8van.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'IgFB40T1tw04A6JGmQqqjQ8S'; //Google client secret
// http://localhost/snap%20it%20!!!(final%20project)/registration/google_signin_authentication_page.php
$redirectURL = 'http://localhost/snap%20it%20!!!(final%20project)/homepage/google_signin_authentication_page.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
