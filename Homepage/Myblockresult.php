<?php


session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
$Block = mysqli_real_escape_string($db, $_POST['Myblockreference2']);
// connect to database

// declaration
$email = $_SESSION['username'];
$answer = "";
// declaration

$query = "SELECT * FROM friends_list WHERE username='$email' AND blockTo='$Block'";
$results=mysqli_query($db, $query);
$row = mysqli_fetch_array($results);
if($row['status'] == "friends")
{
  $query = "UPDATE friends_list SET  blockTo='$answer' ,blockFrom='$answer' ,  username='$email' , friends='$Block' WHERE username='$email' AND blockTo='$Block'";
  mysqli_query($db, $query);
  $query = "UPDATE friends_list SET   blockTo='$answer' ,blockFrom='$answer' ,friends='$email' , username='$Block' WHERE username='$Block' AND blockFrom='$email'";
  mysqli_query($db, $query);
}

else
{
  $query = "DELETE FROM friends_list WHERE username='$email' AND blockTo='$Block'";
  mysqli_query($db, $query);
  $query = "DELETE FROM friends_list WHERE username='$Block' AND blockFrom='$email'";
  mysqli_query($db, $query);
}
 ?>
