<?php
session_start();
$email = $_SESSION['username'];
$reference = $_POST['reference'];
$val = $_POST['val'];
if($val==='like')
{
  $data = file($reference);
  $out = array();
  foreach($data as $line)
  {
          $out[] = $line;
  }
  $fp = fopen($reference, "w+");
  flock($fp, LOCK_EX);
  foreach($out as $line)
  {
          $line = preg_replace('~[\r\n]+~', '', $line);
          if(strcmp($line,'SHARE')==0)
          {
            $txt = $email ."\r\n";
            fwrite($fp, $txt);
          }
          $line = $line."\r\n";
          fwrite($fp, $line);
  }
  flock($fp, LOCK_UN);
  fclose($fp);
}
else
{
  $myfile = fopen($reference, "a") or die("Unable to open file!");
  $data = file($reference);
  $out = array();
  foreach($data as $line) {
      if(trim($line) != $email) {
          $out[] = $line;
      }
  }
  $fp = fopen($reference, "w+");
  flock($fp, LOCK_EX);
  foreach($out as $line) {
  fwrite($fp, $line);
  }
  flock($fp, LOCK_UN);
  fclose($fp);
}
 ?>
