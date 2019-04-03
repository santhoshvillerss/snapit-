<?php

session_start();

// variable declaration
	$errors = array();
  $email=$_SESSION['username'];
// variable declaration


// connect to database
$db = mysqli_connect('localhost','root','','snap_it!!!');
// connect to database

// query
$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db, $query);

  while($row = mysqli_fetch_array($results))
  {
       if($row['friends']!="")
       {
           array_push($errors, $row['friends']);
       }
  }
  $w=0;
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
                   $w++;
                   $hint = "<li >".'<button type="button" name="button" id="Myfriendbutton" style="width: 280px;" >'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px; position:absolute;  left:3px;'>".$error.'</button>'." ".'<button type="button" id='.$error.' class="btn btn-danger" name="button" onclick="myFunction3(this.id)" >'.'<i class="fas fa-lock"></i>'." Block".'</button>'."</li>";
               } else {
                       $w++;
                   $hint .= "\n"."<li >".'<button type="button" name="button" id="Myfriendbutton" style="width: 280px;">'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px;  position:absolute; left:3px; '>".$error.'</button>'." ".'<button type="button" id='.$error.' class="btn btn-danger" name="button"  onclick="myFunction3(this.id)" >'.'<i class="fas fa-lock"></i>'." Block".'</button>'."</li>";
               }
   }
   echo ($hint);
  }
  if($hint=="")
  {
  $hint = '<p>'.'<strong>'.'<center>'."No Friends To Show".'<center>'.'</strong>'.'</p>';
  echo ($hint);
}
// query end

?>
<style media="screen">
  .find_friends_list{
    <?php
    if($w>10)
    {
      ?>
      height: 500px;
      <?php
    }else if($w<=10 && $w>0){
      ?>
      height: auto;
      <?php
    }
    else {
      //echo "st";
      ?>
      /* height: 0px; */
      <?php
//      echo "st";
    }
     ?>
  }
  #Myfriendbutton{
    border: 0px solid transparent;
    /* border-right: 0px solid transparent;
    border-left: 0px solid transparent; */
    background-color: #e0e0d1;
    /* background-image: url("room.jpg"); */
  }
  li{
    border: 1px solid #c2c2a3;
    border-right: 2px solid transparent;
    border-left: 2px solid transparent;
  }
</style>
