<?php
    session_start();

    // connect to database
    $db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
    // connect to database

    // declaration
    $email = $_SESSION['username'];
    $friendrequests = array();
    // declaration



    $query = "SELECT * FROM friends_list WHERE username = '$email'";
    $result = mysqli_query($db, $query);
    $z=0;
    if(mysqli_num_rows($result) > 0)
    {
         while($row = mysqli_fetch_array($result))
         {
              if($row['requestFrom']!="")
              {
                  array_push($friendrequests, $row['requestFrom']);
              }
         }
    }
    $hint = "";
    if (count($friendrequests) > 0)
    {
                   foreach($friendrequests as $friendrequest) {

                            //get profile img

                            $img = "";
                            $query = "SELECT * FROM users WHERE email='$friendrequest' ";
                            $result = mysqli_query($db, $query);
                            $photo = mysqli_fetch_array($result);
                            $img = $photo['profileimg'];
                            //get profile img

                              if ($hint === "") {
                                  $z++;
                            // echo "string";

                                  $hint = "<li >".'<button type="button" name="button" id="friendreqbutton" style="width: 280px;" >'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px; position:absolute;  left:3px;'>".$friendrequest.'</button>'." ".'<button type="button" id='.$friendrequest."Accept".' class="btn btn-success" name="button" onclick="myFunction(this.id)" >'."Accept".'</button>'." ".'<button type="button" class="btn btn-danger" name="button" id='.$friendrequest."Block".' onclick="myFunction1(this.id)" >'."Block".'</button>'."</li>";
                              } else {
                                      $z++;
                            // echo "string";
                                  $hint .= "\n"."<li >".'<button type="button" name="button" id="friendreqbutton" style="width: 280px;">'." "."<img class='border border-secondary rounded-circle' src='$img' style='width:28px;height:28px;  position:absolute; left:3px; '>".$friendrequest.'</button>'." ".'<button type="button" id='.$friendrequest."Accept".' class="btn btn-success" name="button"  onclick="myFunction(this.id)" >'."Accept".'</button>'." ".'<button type="button" class="btn btn-danger" name="button"  id='.$friendrequest."Block".' onclick="myFunction1(this.id)"  >'."Block".'</button>'."</li>";
                              }
                  }

                  // echo $hint === "" ? "no suggestion" : nl2br($hint);
                  echo ($hint);
                  // echo ($hint);
                  // echo $z;
    }
    if($hint == "")
    {
    $hint = '<p>'.'<strong>'.'<center>'."No Friends Request".'<center>'.'</strong>'.'</p>';
    echo ($hint);
    }
 ?>

<style media="screen">
  .friends_data{
    <?php
    if($z>10)
    {
      ?>
      height: 500px;
      <?php
    }else if($z<=10 && $z>0){
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
  #friendreqbutton{
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
