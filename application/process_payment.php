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



///////////////////////////////////////////////////////////////////
$Fullname =  mysqli_real_escape_string($conn, $_POST['customer']);
$ACCNO = mysqli_real_escape_string($conn, $_POST['account']);
$Cramount = mysqli_real_escape_string($conn, $_POST['amount_to_pay']);
$Tdate = mysqli_real_escape_string($conn, $_POST['pay_date']);
$agent = mysqli_real_escape_string($conn, $_POST['teller']);
$Description = mysqli_real_escape_string($conn, $_POST['remarks']);
$GroupNo = mysqli_real_escape_string($conn, $_POST['group']);
$Ltype = "0";
$LoanID = "0";
$Interestrate = "0";
$Iamount = "0";
$status = "0";
$Enddate = "0";
$ScheduleAmount = "0";
$Branchcode = mysqli_real_escape_string($conn, $_POST['ttype']);
$Dramount = "0";
$Duration = "0";
$Orgin = "0";
$Special = "0";
$TRECEPT = mysqli_real_escape_string($conn, $_POST['treceipt']);
$Typecode = "0";
$Log = mysqli_real_escape_string($conn, $_POST['teller']);
$Scheduleday = "0";

//$insert = mysqli_query($conn, "INSERT INTO trans('','$TRECEPT','$Tdate','$Enddate','$Typecode','$Branchcode','$GroupNo','$ACCNO','$Fullname','$Cramount','$Dramount','$LoanID','$Interestrate','$Iamount','$ScheduleAmount','$Scheduleday','$Description','$Ltype','$Duration','$Orgin','$Special','$status','$agent','$Log') VALUES('','$tid',$acount,'$account_no','$customer','$loan','$pay_date','$amount_to_pay','$remarks')") or die (mysqli_error($conn));
//if(!$insert)
$insert = mysqli_query($conn, "INSERT INTO trans VALUES('','$TRECEPT','$Tdate','$Enddate','$Typecode','$Branchcode','$GroupNo','$ACCNO','$Fullname','$Cramount','$Dramount','$LoanID','$Interestrate','$Iamount','$ScheduleAmount','$Scheduleday','$Description','$Ltype','$Duration','$Orgin','$Special','$status','$agent','$Log')") or die (mysqli_error($conn));
if(!$insert)







///////////////////////////////
{
echo '<meta http-equiv="refresh" content="2;url=newpayments.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Unable to payment records.....Please try again later!</span>';
}
else{
echo '<meta http-equiv="refresh" content="2;url=listpayment.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Saving Payment.....Please Wait!</span>';
}

?>
</div>
</body>
</html>
