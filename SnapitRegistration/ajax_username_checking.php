<?php
   	$db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
     $user = mysqli_real_escape_string($db, $_POST['email_id']);
     //echo $user;
      $sql = "SELECT * FROM users WHERE email='$user' ";
      $result = mysqli_query($db,$sql);
    //  echo mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0)
      {
        echo '<span class="username">* Email id already registered</span>';
      }
      else {
        echo '<span class="username">* Email id Available</span>';
      }

 ?>
