<?php
session_start();
$email=$_SESSION['username'];
//    if(isset($_POST["limit"], $_POST["start"]))
      $username = '';
      $limit = $_POST["limit"];
      $start = $_POST["start"];
      if(isset($_POST["username"]))
      {
      $username = $_POST["username"];

    // echo "<div style='margin-left:100px;' class='container'>";
  //  foreach($username as $line)
     for($i=$start;$i<=$limit;$i++)
     {
                    $lineext =  str_replace(array('jpg','jpeg','png','pdf'), 'txt', $username[$i]);

                    if($username[$i]!='')
                    {

                    $realname = '';
                    $count = 0;
                    $j=0;
                    for($k=0;$k<strlen($username[$i]);$k++)
                    {
                      if($username[$i][$k]=='/')
                      {
                        $count++;
                      }
                      else if($count==3)
                      {
                          $realname[$j] = $username[$i][$k];
                          $j++;
                      }
                    }

                    echo "<div style='width:75%; padding-top: 1px; padding-bottom: 1px;' class='jumbotron' >";
                    echo "<div ><a href='' style='color: black;'><h1 class='display-4' align='center' style='font-size:30px;' ><span style='font-size:15px;'>Posted By </span><strong>".$realname."</strong></h1></a></div>";
                    echo "<hr class='my-1' style='margin: 9px 0!important;'>";
                    echo "<img  src='".$username[$i]."' alt='' width='100%' height='230px' style=''>";
                    echo "<hr class='my-1' style='margin: 5px 0!important;'>";
                    echo "<table>
                      <tr>
                        <td style='padding: 15px;'><button id='".$lineext."' value='like' onclick='like(this.id,this.value)' class='btn btn-sm btn-outline-secondary' style='background-color:transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-thumbs-up'></i>  like</button><span class='popuptext' id='myPopup'>A Simple Popup!</span></td>
                        <td style='padding: 15px;'><button id='".$lineext."' onclick='snapcmd(this.id)' class='btn btn-sm btn-outline-secondary' style='background-color: transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-comments'></i>  comment</button></td>
                        <td style='padding: 15px;'><button id='".$username[$i]."' value='share' onclick='share(this.id,this.value)' class='btn btn-sm btn-outline-secondary' style='background-color: transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-share-square'></i>  share</button></td>
                      </tr>
                    </table>";
                    echo "</div>";

                    $datas = file($lineext);
                    $out = array();
                    foreach($datas as $lin)
                    {
                            $lin = preg_replace('~[\r\n]+~', '', $lin);
                            if($lin!='SHARE')
                            {
                              if($lin==$email)
                              {
                                $flag = 0;
                                ?>
                                <script type="text/javascript">
                                document.getElementById('<?php echo $lineext ?>').style.backgroundColor = "#ffb3b3";
                                document.getElementById('<?php echo $lineext ?>').value = "liked";
                                </script>
                                <?php
                                // ';
                              }
                            }
                            else
                            {
                              break;
                            }
                    }

                  }
                }
                }
   //             fclose($myfile);
   //         }
   // }
   // echo "</div>";
// }

?>
