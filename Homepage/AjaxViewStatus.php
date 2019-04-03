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

                  //  $popup = strcpy($username[$i]);
                    $popup =  '';
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
                    $popup = $username[$i];

                    // $popup = str_replace('@gmail.com', '', $realname);
                    // $j = strlen($popup);
                    // $count=0;
                    // for($k=0;$k<strlen($username[$i]);$k++)
                    // {
                    //   if($username[$i][$k]=='/')
                    //   {
                    //     $count++;
                    //   }
                    //   else if($count>3)
                    //   {
                    //       $popup[$j] = $username[$i][$k];
                    //       $j++;
                    //   }
                    // }
                    $popup =  str_replace(array('.','-',' ','/','@','jpg','jpeg','png','pdf'), '', $popup);
                    $popuptext = $popup.'text';
                    $mypopup = 'my'.$popup;
                    $dummy = $mypopup."dummy";
                  //  echo $lineext;


                    $data = file($lineext);
                    $likecount=0;
                    foreach($data as $line)
                    {
                            $line = preg_replace('~[\r\n]+~', '', $line);
                            if(strcmp($line,'LIKES')==0)
                            {
                                continue;
                            }
                            else if(strcmp($line,'SHARE')==0)
                            {
                                break;
                            }
                            else
                            {
                                $likecount++;
                            }
                    }


                    echo "<div style='width:75%; padding-top: 1px; padding-bottom: 1px;' class='jumbotron' >";
                    echo "<div ><a href='' style='color: black;'><h1 class='display-4' align='center' style='font-size:30px;' ><span style='font-size:15px;'>Posted By </span><strong>".$realname."</strong></h1></a></div>";
                    echo "<hr class='my-1' style='margin: 9px 0!important;'>";
                    echo "<img  src='".$username[$i]."' alt='' width='100%' height='230px' style=''>";
                    echo "<hr class='my-1' style='margin: 5px 0!important;'>";
                    echo "<table>
                      <tr>
                        <td  style='padding: 15px;'><div class=".$popup."><div id=".$dummy." onmouseover='myFunction(this.id)' onmouseout='myFunction(this.id)'><button id='".$lineext."' value='like' onclick='like(this.id,this.value)' class='btn btn-sm btn-outline-secondary '   style='background-color:transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-thumbs-up'></i>  like</button></div>
                        <span class=".$popuptext." id=".$mypopup.">".$likecount." Likes</span>
                        </div>
                        </td>
                        <td style='padding: 15px;'><button id='".$lineext."' onclick='snapcmd(this.id)' class='btn btn-sm btn-outline-secondary' style='background-color: transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-comments'></i>  comment</button></td>
                        <td style='padding: 15px;'><button id='".$username[$i]."' value='share' onclick='share(this.id,this.value)' class='btn btn-sm btn-outline-secondary' style='background-color: transparent !important; border: none;    cursor:pointer;    overflow: hidden;    outline:none;' type='button' name='button'><i class='far fa-share-square'></i>  share</button></td>
                      </tr>
                    </table>";
                    echo "</div>";
                    ?>
                    <script>
                    				function myFunction(dummy) {
                    				  var popup = document.getElementById(dummy).id;
                              popup = popup.replace("dummy", "");
                              popup = document.getElementById(popup);
                              //alert(res);
                    				  popup.classList.toggle('show');
                    				}
                    </script>
                    <?php
                    echo "	<meta name='viewport' content='width=device-width, initial-scale=1'>
                    				<style>
                    				.".$popup." {
                    				  position: relative;
                    				  display: inline-block;
                    				  cursor: pointer;
                    				  -webkit-user-select: none;
                    				  -moz-user-select: none;
                    				  -ms-user-select: none;
                    				  user-select: none;
                    				}

                    				.".$popup." .".$popuptext." {
                    				  visibility: hidden;
                    				  width: 60px;
                    				  background-color: #555;
                    				  color: #fff;
                    				  text-align: center;
                    				  border-radius: 6px;
                    				  padding: 2px 0;
                    				  position: absolute;
                    				  /* z-index: 1; */
                    				  bottom: 125%;
                    				  left: 50%;
                    				  margin-left: -30px;
                    				}

                    				.".$popup." .".$popuptext."::after {
                    				  content: '';
                    				  position: absolute;
                    				  top: 100%;
                    				  left: 50%;
                    				  margin-left: -5px;
                    				  border-width: 5px;
                    				  border-style: solid;
                    				  border-color: #555 transparent transparent transparent;
                    				}

                    				.".$popup." .show {
                    				  visibility: visible;
                    				  -webkit-animation: fadeIn 1s;
                    				  animation: fadeIn 1s;
                    				}

                    				@-webkit-keyframes fadeIn {
                    				  from {opacity: 0;}
                    				  to {opacity: 1;}
                    				}

                    				@keyframes fadeIn {
                    				  from {opacity: 0;}
                    				  to {opacity:1 ;}
                    				}
                    				</style> ";




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
?>
