<?php
    session_start();

    // connect to database
    $db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
    $snapit_members = mysqli_real_escape_string($db, $_POST['snapit_members']);
    // connect to database

    // declaration
    $email = $_SESSION['username'];
    $snapitmembers = array();
    $output = '';
    // declaration


    // $query = "SELECT * FROM friens_list WHERE username LIKE '%".$_POST["query"]."%'";
    $query = "SELECT * FROM users WHERE email != '$email'";
    $result = mysqli_query($db, $query);
    // echo $result;
    // $output = '<ul class="list-unstyled">';
    $x=0;
    if(mysqli_num_rows($result) > 0)
    {
         while($row = mysqli_fetch_array($result))
         {
              array_push($snapitmembers, $row['email']);
              // $output .= '<li>'.$row['friends'].'<button type="button" name="button">'."hello".'</button>'.'</li>';
         }
    }
    if (count($snapitmembers) > 0)
    {
                  $hint = "";
                  if ($snapit_members !== "") {
                      $snapit_members = strtolower($snapit_members);
                      $len=strlen($snapit_members);
                      foreach($snapitmembers as $snapitmember) {
                          if (stristr($snapit_members, substr($snapitmember, 0, $len))) {

                            //get profile img
                            $img = "";
                            $query = "SELECT * FROM users WHERE email='$snapitmember' ";
                            $result = mysqli_query($db, $query);
                            $photo = mysqli_fetch_array($result);
                            $img = $photo['profileimg'];
                            //get profile img

                              if ($hint === "") {
                                  $x++;
                                  $hint = '<button type="button" name="button" id="button" style="width: 350px;" >'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px; position:absolute; left:40px;'>".$snapitmember.'</button>';
                              } else {
                                  $x++;
                                  $hint .= "\n".'<button type="button" name="button" id="button" style="width: 350px;">'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px;  position:absolute; left:40px;'>".$snapitmember.'</button>';
                              }
                          }
                      }
                  }

                  // echo $hint === "" ? "no suggestion" : nl2br($hint);
                  echo nl2br($hint);
                  //echo $x;
    }
 ?>

<style media="screen">
  .scroll_bar{
    <?php
    if($x>13)
    {
      ?>
      height: 500px;
      <?php
    }else if($x<=13 && $x>0){
      ?>
      height: auto;
      <?php
    }
    else {
      ?>
      height: 0px;
      <?php
    }
     ?>
  }
  #button{
    border: 1px solid #c2c2a3;
    background-color: #e0e0d1;
    /* background-image: url("room.jpg"); */
  }
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
  </body>
</html>
