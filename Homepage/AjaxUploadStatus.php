<?php
    session_start();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<meta charset="utf-8">
<?php
$file = $_FILES['userImage'];
$filename = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileerror = $file['error'];
$filetype = $file['type'];
//print_r($file);

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
             $filePostName = $date;
             $fileNameNew = $date.".".$fileActualExt;
             $fileDestination = '../images/posted/'.$tmpemail.'/'.$fileNameNew;
             $filePostName = '../images/posted/'.$tmpemail.'/'.$filePostName;
             move_uploaded_file($fileTmpName,$fileDestination);
             {
               // $file = file_get_contents($filename);
               // $content = 'Your Content' . $file;
               // file_put_contents($content);

               $createfile = "../images/posted/posted.txt";
               $file = file_get_contents($createfile);
               $txt = $fileDestination ."\r\n";
               $content = $txt . $file;
               file_put_contents($createfile,$content);



               $createimgfile = $filePostName.".txt";
               $myfile = fopen($createimgfile, "a");
               $txt = "LIKES\r\n";
               fwrite($myfile, $txt);
               $txt = "SHARE\r\n";
               fwrite($myfile, $txt);
               $txt = "COMMENT\r\n";
               fwrite($myfile, $txt);
               fclose($myfile);


               $createfile = "../images/posted/".$tmpemail."/".$tmpemail.".txt";
               $myfile = fopen($createfile, "a");
               $txt = $fileDestination ."\r\n";
         			 fwrite($myfile, $txt);
               fclose($myfile);



                       echo "<div style='width:75%; padding-top: 1px; padding-bottom: 1px;' class='jumbotron' >";
                       echo "<div ><a href='' style='color: black;'><h1 class='display-4' align='center' style='font-size:30px;' ><span style='font-size:15px;'>Posted By </span><strong>".$tmpemail."</strong></h1></a></div>";
                       echo "<hr class='my-1' style='margin: 9px 0!important;'>";
                       echo "<img  src='".$fileDestination."' alt='' width='100%' height='230px' style=''>";
                       echo "<hr class='my-1' style='margin: 5px 0!important;'>";
                       echo "<table>
                         <tr>
                           <td style='padding: 15px;'><button id='".$createimgfile."' value='like'  onclick='like(this.id,this.value)'  class='btn btn-sm btn-outline-secondary' style='background-color:transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-thumbs-up'></i>  like</button></td>
                           <td style='padding: 15px;'><button id='".$createimgfile."' value='' onclick='' class='btn btn-sm btn-outline-secondary' style='background-color: transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-comments'></i>  comment</button></td>
                           <td style='padding: 15px;'><button id='".$fileDestination."' value='share' onclick='share(this.id,this.value)' class='btn btn-sm btn-outline-secondary' style='background-color: transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-share-square'></i>  share</button></td>
                         </tr>
                       </table>";
                       echo "</div>";
                       // #ffcccc #b3e0ff #ffb3ff

              }
        }
        else {
      //    echo "Your file is too big!";
        }
     }
     else {
    //   echo "There was an error uploading your file!";
     }
}
else {
  //echo "You cannot upload files of this type";
}
?>

<script type="text/javascript">
function like(id,val) {
  var reference = document.getElementById(id).id;
  //alert(reference);
  if(val == 'like')
   {
        document.getElementById(id).style.backgroundColor = "#ffb3b3";
        document.getElementById(id).value = "liked";
   }
   else
   {
        document.getElementById(id).style.backgroundColor = "transparent";
        document.getElementById(id).value = "like";
   }
   $.ajax({
     url:"Updatelike.php",
     method:"POST",
     data:{reference:reference,val:val},
     dataType:"text",
   });
 }

</script>
