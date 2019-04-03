<!-- <script type="text/javascript">
  alert("hello");
</script> -->
<?php
session_start();
// $file = $_FILES['userImage'];
// print_r($file) ;
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
             $date = date('Y-m-d H-i-s');
             $tmpemail = $_SESSION['username'];
             $fileNameNew = $date.".".$fileActualExt;
             $fileDestination = 'images/posted/'.$tmpemail.'/'.$fileNameNew;
             move_uploaded_file($fileTmpName,$fileDestination);
             {


               $a = "hello";

                       echo "<div style='width:75%; padding-top: 1px;' class='jumbotron' >";

                         echo "<div ><a href='".$a."' style='color: black;'><h1 class='display-4' align='center' style='font-size:30px;' ><span style='font-size:15px;'>Posted By </span><strong>".$a."</strong></h1></a></div>";
                         echo "<hr class='my-1' style='margin: 9px 0!important;'>
                         <table>
                           <tr>

                             <td><p style='font-size:20px;'>".$a."</p></br><p>".$a."</p></br>
                             <div  class='pretty p-switch p-slim'>
                                <input type='checkbox' id='".$a."' onchange='Bookmark(this.id)' />
                                <div class='state p-danger'>
                                    <label>Bookmark</label>
                                </div>
                            </div>
                            </td>
                           </tr>
                         </table>";
                      echo "</div>";


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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
  <body>
  </body>
</html>
