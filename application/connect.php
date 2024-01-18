<?php
$conn=mysqli_connect('localhost','root','',"loan");

if(!$conn){
  echo 'connection error: ' . mysqli_connect_error();
}
?>
