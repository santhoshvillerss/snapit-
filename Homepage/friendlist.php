<?php
    session_start();

    // connect to database
    $db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
    $friend_request = mysqli_real_escape_string($db, $_POST['friend_request']);
    // connect to database

    // declaration
    $email = $_SESSION['username'];
    $errors = array();
    $output = '';
    // declaration


    // $query = "SELECT * FROM friens_list WHERE username LIKE '%".$_POST["query"]."%'";
    $query = "SELECT * FROM friends_list WHERE username = '$email'";
    $result = mysqli_query($db, $query);
    // echo $result;
    // $output = '<ul class="list-unstyled">';

    if(mysqli_num_rows($result) > 0)
    {
         while($row = mysqli_fetch_array($result))
         {
              array_push($errors, $row['friends']);
              // $output .= '<li>'.$row['friends'].'<button type="button" name="button">'."hello".'</button>'.'</li>';
         }
    }
    if (count($errors) > 0)
    {
                  $hint = "";
                  if ($friend_request !== "") {
                      $friend_request = strtolower($friend_request);
                      $len=strlen($friend_request);
                      foreach($errors as $error) {
                          if (stristr($friend_request, substr($error, 0, $len))) {
                              if ($hint === "") {
                                  $hint = '<button type="button" name="button" id="button" style="width: 350px; ">'.$error.'</button>';
                              } else {
                                  $hint .= "\n".'<button type="button" name="button" id="button" style="width: 350px;">'.$error.'</button>';
                              }
                          }
                      }
                  }
                  // echo $hint === "" ? "no suggestion" : nl2br($hint);
                  echo nl2br($hint);;
    }
 ?>
<style media="screen">
  #button{
    border: 1px solid #c2c2a3;;
  }
</style>
