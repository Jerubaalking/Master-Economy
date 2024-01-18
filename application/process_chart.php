<?php include "../config/session.php"; ?>

<!DOCTYPE html>
<html>
<head>

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  margin:auto;

}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<br><br><br><br><br><br><br><br><br>
<div style="width:100%;text-align:center;vertical-align:bottom">
		<div class="loader"></div>
<?php
if(isset($_POST['savechart']))
{
$tid = $_SESSION['tid'];
$Typecode = mysqli_real_escape_string($conn, $_POST['transcode']);
$Transtype =  mysqli_real_escape_string($conn, $_POST['transtype']);
$Branchcode = mysqli_real_escape_string($conn, $_POST['branchcode']);
$Transbranch = mysqli_real_escape_string($conn, $_POST['transbranch']);
$user = mysqli_real_escape_string($conn, $_POST['teller']);

$insert = mysqli_query($conn, "INSERT INTO chart(ID,Typecode,Transtype,Branchcode,Transbranch,user) VALUES('','$Typecode','$Transtype','$Branchcode','$Transbranch','$user')") or die (mysqli_error($conn));
if(!$insert)
{
echo '<meta http-equiv="refresh" content="2;url=newchart.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Unable to payment records.....Please try again later!</span>';
}
else{
echo '<meta http-equiv="refresh" content="2;url=listpayment.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Saving Payment.....Please Wait!</span>';
}
}
?>

</div>
</body>
</html>
