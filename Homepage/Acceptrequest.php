<?php

session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
$AcceptorBlock = mysqli_real_escape_string($db, $_POST['reference2']);
// connect to database

// declaration
$email = $_SESSION['username'];
$answer = "";
$status = "friends";
// declaration

// query
$query = "UPDATE friends_list SET status='$status' , requestFrom='$answer' , friends='$AcceptorBlock' WHERE username='$email' AND requestFrom='$AcceptorBlock'";
$result = mysqli_query($db, $query);
$query = "UPDATE friends_list SET status='$status' , requestTo='$answer' , friends='$email' WHERE username='$AcceptorBlock' AND requestTo='$email'";
$result = mysqli_query($db, $query);
// query

 ?>
<!-- // <!DOCTYPE html>
// <html lang="en" dir="ltr">
//   <head>
//     <meta charset="utf-8">
//     <title></title>
//   </head>
//   <body>
//     <p>hello</p>
//   </body>
// </html> -->
