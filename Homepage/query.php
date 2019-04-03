<?php
  $a=21;
  $i=1;
  $db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
   //while($a<46)
//   {
//   $email2 = "user1@gmail.com";
//   $email1 = "user200@gmail.com";
//   //$email = md5($email);
//   //$a+=2;
//   // $query = "UPDATE users SET password='$email' WHERE id='$a'";
//   $query = "INSERT INTO friends_list (username, blockFrom) VALUES('$email2','$email1')";
//   // $a++;
//   mysqli_query($db, $query);
//   // $query = "INSERT INTO friends_list (username, requestTo)
//   //       VALUES('$email1','$email2')";
//   // $a++;
//   // mysqli_query($db, $query);
 $query = "DELETE FROM friends_list WHERE id='221'";
 mysqli_query($db, $query);
// }
 ?>
