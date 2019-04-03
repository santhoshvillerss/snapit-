<?php

session_start();

// variable declaration
	$errors = array();
  $email=$_SESSION['username'];
// variable declaration


// connect to database
$db = mysqli_connect('localhost','root','','snap_it!!!');
// connect to database

$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db, $query);

  while($row = mysqli_fetch_array($results))
  {
       if($row['blockTo']!="")
       {
           array_push($errors, $row['blockTo']);
       }
  }


  $u=0;
  $hint = "";
  if (count($errors) > 0)
  {


    foreach($errors as $error) {

             //get profile img

             $img = "";
             $query = "SELECT * FROM users WHERE email='$error' ";
             $result = mysqli_query($db, $query);
             $photo = mysqli_fetch_array($result);
             $img = $photo['profileimg'];
             //get profile img

               if ($hint === "") {
                   $u++;

                   $hint = "<li >".'<button type="button" name="button" id="findfriendbutton" style="width: 280px;" >'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px; position:absolute;  left:3px;'>".$error.'</button>'." ".'<button type="button" id='.$error.' class="btn btn-danger" name="button" onclick="myFunction4(this.id)" >'.'<i class="fas fa-lock-open"></i>'." UnBlock".'</button>'."</li>";
               } else {
                       $u++;
                   $hint .= "\n"."<li >".'<button type="button" name="button" id="findfriendbutton" style="width: 280px;">'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px;  position:absolute; left:3px; '>".$error.'</button>'." ".'<button type="button" id='.$error.' class="btn btn-danger" name="button"  onclick="myFunction4(this.id)" >'.'<i class="fas fa-lock-open"></i>'." UnBlock".'</button>'."</li>";
               }
   }

   echo ($hint);
  }
  if($hint == "")
  {
  $hint = '<p>'.'<strong>'.'<center>'."No Members Blocked".'<center>'.'</strong>'.'</p>';
  echo ($hint);
  }

 ?>


 <style media="screen">
   .block_friends_list{
     <?php
     if($u>10)
     {
       ?>
       height: 500px;
       <?php
     }else if($u<=10 && $u>0){
       ?>
       height: auto;
       <?php
     }
     else {
       ?>
       /* height: 0px; */
       <?php
     }
      ?>
   }
   #findfriendbutton{
     border: 0px solid transparent;
     background-color: #e0e0d1;
   }
   li{
     border: 1px solid #c2c2a3;
     border-right: 2px solid transparent;
     border-left: 2px solid transparent;
   }
 </style>
