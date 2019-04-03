<?php
session_start();

// variable declaration
	$errors1 = array();
  $errors2 = array();
  $email=$_SESSION['username'];
// variable declaration


// connect to database
$db1 = mysqli_connect('localhost','root','','snap_it!!!');
$db2 = mysqli_connect('localhost','root','','snap_it!!!');
// connect to database


//get usernames
$query = "SELECT * FROM users WHERE email != '$email' ";
$results = mysqli_query($db1, $query);
if (mysqli_num_rows($results) > 0)
{
  while($row = mysqli_fetch_array($results))
  {
       if($row['email']!="")
       {
           array_push($errors1, $row['email']);
       }
  }
}
//
// if (count($errors1) > 0)
// {
// 		 foreach ($errors1 as $error)
//      {
// 			 echo $error."\n";
//      }
// }

//get usernames


//to get friends list
$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db2, $query);
if (mysqli_num_rows($results) > 0)
{
  while($row = mysqli_fetch_array($results))
  {
       if($row['friends']!="")
       {
           array_push($errors2, $row['friends']);
       }
  }
}

//to get friends list

//to get requestFrom list

$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db2, $query);

  while($row = mysqli_fetch_array($results))
  {
       if($row['requestFrom']!="")
       {
           array_push($errors2, $row['requestFrom']);
       }
  }

//to get requestFrom list

//to get requestTo list
$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db2, $query);

  while($row = mysqli_fetch_array($results))
  {
       if($row['requestTo']!="")
       {
           array_push($errors2, $row['requestTo']);
       }
  }

$errors1 = array_diff($errors1, $errors2);

//to get requestTo list

//to get BlockFrom list
$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db2, $query);

  while($row = mysqli_fetch_array($results))
  {
       if($row['blockFrom']!="")
       {
           array_push($errors2, $row['blockFrom']);
       }
  }
//to get BlockFrom list

//to get BlockTo list
$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db2, $query);

  while($row = mysqli_fetch_array($results))
  {
       if($row['blockTo']!="")
       {
           array_push($errors2, $row['blockTo']);
       }
  }
//to get BlockTo list

$errors1 = array_diff($errors1, $errors2);
// sort($errors1);

$y=0;
$hint = "";
if (count($errors1) > 0)
{


  foreach($errors1 as $error) {

           //get profile img

           $img = "";
           $query = "SELECT * FROM users WHERE email='$error' ";
           $result = mysqli_query($db1, $query);
           $photo = mysqli_fetch_array($result);
           $img = $photo['profileimg'];
           //get profile img

             if ($hint === "") {
                 $y++;

                 $hint = "<li >".'<button type="button" name="button" id="findfriendbutton" style="width: 280px;" >'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px; position:absolute;  left:3px;'>".$error.'</button>'." ".'<button type="button" id='.$error.' class="btn btn-primary" name="button" onclick="myFunction2(this.id)" >'."Friends".'</button>'."</li>";
             } else {
                     $y++;
                 $hint .= "\n"."<li >".'<button type="button" name="button" id="findfriendbutton" style="width: 280px;">'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px;  position:absolute; left:3px; '>".$error.'</button>'." ".'<button type="button" id='.$error.' class="btn btn-primary" name="button"  onclick="myFunction2(this.id)" >'."Friends".'</button>'."</li>";
             }
 }

 echo ($hint);
}
if($hint == "")
{
$hint = '<p>'.'<strong>'.'<center>'."No Members".'<center>'.'</strong>'.'</p>';
echo ($hint);
}
?>

<style media="screen">
  .friends_list{
    <?php
    if($y>10)
    {
      ?>
      height: 500px;
      <?php
    }else if($y<=10 && $y>0){
      ?>
      height: auto;
      <?php
    }
    else {
      //echo "st";
      ?>
      /* height: 0px; */
      <?php
    }
     ?>
  }
  #findfriendbutton{
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
