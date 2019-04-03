
<?php
   session_start();
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
                 echo $tmpemail;
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
             echo "Your file is too big!";
           }
        }
        else {
          echo "There was an error uploading your file!";
        }
   }
   else {
     echo "You cannot upload files of this type";
   }

 ?>
