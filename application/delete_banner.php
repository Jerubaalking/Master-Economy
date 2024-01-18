<?php
include "../config/session.php";
$id = $_GET['id'];
$dph = mysqli_query($conn, "DELETE FROM banner WHERE banaid = '$id'") or die (mysqli_error($conn));
if(!$dph)
{
echo "<script>alert('Unable to Delete Banner!!!.......please try again later');</script>";
}
else{
echo "<script>alert('Banner Delete successfully!!!');</script>";
echo "<script>window.location='banner.php?id=".$id."';</script>";
}
?>
