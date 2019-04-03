<?php
session_start();

$email = $_SESSION['username'];

$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
$friendrequest = mysqli_real_escape_string($db, $_POST['findreference2']);

$query = "INSERT INTO friends_list (username ,requestTo)  VALUES('$email', '$friendrequest')";
mysqli_query($db, $query);

$query = "INSERT INTO friends_list (username ,requestFrom)  VALUES('$friendrequest', '$email')";
mysqli_query($db, $query);
 ?>
