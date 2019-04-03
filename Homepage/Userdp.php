<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <?php

  $tmpemail = $_SESSION['username'];
  $img = "";
  $query = "SELECT * FROM users WHERE email='$tmpemail' ";
  if(mysqli_query($db, $query))
  {
  $result = mysqli_query($db, $query);
  $photo = mysqli_fetch_array($result);
  $img = $photo['dpimg'];
  }
  if($img=="")
  {
    $img='../images/profile/nophoto.jpg';
    // $img='../images/profile/santhoshvillerss@gmail.com.jpg';
    //echo $img;
  }

  echo "<style media='screen'>
  #jumbotron{
    margin-top: 0px;
    background-image: url('$img');";
    if($img=='../images/profile/nophoto.jpg')
    {
    echo "
    background-size: auto;";
    }
    else {
      echo "
      background-size: cover;";
    }
    echo "
    height: 350px;
  }
  </style>
  ";

   ?>

  <body>

    <div class="container ">
        <div class="jumbotron" id="jumbotron">
          <br><br><br><br><br><br><br><br>
          <?php  if (isset($_SESSION['username'])) { ?>
            <p <?php if($img!='../images/profile/nophoto.jpg'){
              echo 'id="white"';
            } ?>><strong><?php echo $_SESSION['username']; ?></strong></p>
          <?php } ?>

          <form enctype="multipart/form-data" method="POST" action="" >
          <input name="userImage" type="file" class="btn btn-secondary" />
          <input type="submit" name="submit" style="margin-left: 2px;" value="Submit" class="btn btn-secondary" />
          </form>


          <?php

          if (isset($_POST['submit']))
					{
             $file = $_FILES['userImage'];
             $filename = $file['name'];
             $fileTmpName = $file['tmp_name'];
             $fileSize = $file['size'];
             $fileerror = $file['error'];
             $filetype = $file['type'];

             $fileExt = explode('.',$filename);
             try{
                  $fileActualExt = strtolower(end($fileExt));
              } catch(Exception $e){
                  echo $e->getMessage();
              }

             $allowed = array('jpg','jpeg','png','pdf');

             if(in_array($fileActualExt,$allowed)){
                  if($fileerror == 0)
                  {
                     if($fileSize < 10000000)
                     {
                           $tmpemail = $_SESSION['username'];
                           // echo $tmpemail;
                           $db = mysqli_connect('localhost', 'root', '', 'snap_it!!!');
                          // $fileNameNew = uniqid('',true).".".$fileActualExt;
                          $fileNameNew = $tmpemail.".".$fileActualExt;
                          $fileDestination = '../images/dp/'.$fileNameNew;
                          $query = "UPDATE users SET dpimg='$fileDestination' WHERE email='$tmpemail'";
                          mysqli_query($db, $query);
                          move_uploaded_file($fileTmpName,$fileDestination);
                          {
                            // header("location:User");
                           }
                     }
                     else {
                  //     echo "Your file is too big!";
                     }
                  }
                  else {
                //    echo "There was an error uploading your file!";
                  }
             }
             else {
              // echo "You cannot upload files of this type";
             }
           }
           ?>


<!--
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript">
            $(document).ready(function (e) {
            	$("#uploadForm").on('submit',(function(e) {
            		e.preventDefault();
            		$.ajax({
                  url: "upload.php",
            			type: "POST",
            			data:  new FormData(this),
            			contentType: false,
                	cache: false,
            			processData:false,
            			success: function(data)
            		    {
            			        $("#targetLayer").html(data);
            		    },
            		  	error: function()
            	    	{
            	    	}
            	   });
            	}));
            });
            </script>
 -->

    </div>
    </div>
    <?php

    ?>
  </body>
</html>
