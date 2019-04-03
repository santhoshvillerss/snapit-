<?php

session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
$Myfriends = mysqli_real_escape_string($db, $_POST['Myfindreference2']);
// connect to database

// declaration
$email = $_SESSION['username'];
$answer = "";
// declaration

// query
$query = "UPDATE friends_list SET  BlockTo='$Myfriends' , friends='$answer' WHERE username='$email' AND friends='$Myfriends'";
$result = mysqli_query($db, $query);
$query = "UPDATE friends_list SET  BlockFrom='$email' , friends='$answer' WHERE username='$Myfriends' AND friends='$email'";
$result = mysqli_query($db, $query);
// query

 ?>
