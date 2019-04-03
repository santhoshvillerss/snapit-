<?php

session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
$AcceptorBlock = mysqli_real_escape_string($db, $_POST['reference2']);
// connect to database

// declaration
$email = $_SESSION['username'];
$answer = "";
// declaration

// query
$query = "UPDATE friends_list SET requestFrom='$answer' , blockTo='$AcceptorBlock' WHERE username='$email' AND requestFrom='$AcceptorBlock'";
$result = mysqli_query($db, $query);
$query = "UPDATE friends_list SET requestTo='$answer' , blockFrom='$email' WHERE username='$AcceptorBlock' AND requestTo='$email'";
$result = mysqli_query($db, $query);
// query

?>
