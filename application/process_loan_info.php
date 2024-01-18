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
if(isset($_POST['save_loan']))
{
$borrower =  mysqli_real_escape_string($conn, $_POST['borrower']);
$baccount = mysqli_real_escape_string($conn, $_POST['account']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$date_release = mysqli_real_escape_string($conn, $_POST['date_release']);
$agent = mysqli_real_escape_string($conn, $_POST['agent']);
$gname = mysqli_real_escape_string($conn, $_POST['g_name']);
$gphone = mysqli_real_escape_string($conn, $_POST['g_phone']);

$g_rela = mysqli_real_escape_string($conn, $_POST['grela']);
$g_address = mysqli_real_escape_string($conn, $_POST['gaddress']);

$status = mysqli_real_escape_string($conn, $_POST['status']);
$remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
$pay_date = mysqli_real_escape_string($conn, $_POST['pay_date']);
$amount_topay = mysqli_real_escape_string($conn, $_POST['amount_topay']);
$upstatus = "Pending";
$teller = mysqli_real_escape_string($conn, $_POST['teller']);
$remark = mysqli_real_escape_string($conn, $_POST['remark']);




$insert = mysqli_query($conn, "INSERT INTO loan_info VALUES('','$borrower','$baccount','$desc','$amount','$date_release','$agent','$gname','$gphone','$g_address','$g_rela','$location','$status','$remarks','$pay_date','$amount_topay','$teller','$remark','$upstatus')") or die (mysqli_error($conn));
if(!$insert)
{
 //echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Unable to Save Loan Information.....Please try again later!</span>';
}
else{
echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Saving Loan Information.....4 more steps to complete the request.</span>';
}
}

?>
</div>









<br><br><br><br><br><br><br><br><br>
<div style="width:100%;text-align:center;vertical-align:bottom">
  <div class="loader"></div>
<?php
if(isset($_POST['save_loan']))
{
$Fullname =  mysqli_real_escape_string($conn, $_POST['borrower']);
$ACCNO = mysqli_real_escape_string($conn, $_POST['account']);
$Description = mysqli_real_escape_string($conn, $_POST['desc']);
$Dramount = mysqli_real_escape_string($conn, $_POST['amount']);
$Tdate = mysqli_real_escape_string($conn, $_POST['date_release']);
$agent = mysqli_real_escape_string($conn, $_POST['agent']);
$GroupNo = mysqli_real_escape_string($conn, $_POST['Group1']);
$Ltype = mysqli_real_escape_string($conn, $_POST['Ltype']);
$LoanID = mysqli_real_escape_string($conn, $_POST['LoanID']);
$Interestrate = mysqli_real_escape_string($conn, $_POST['Interestrate']);
$Iamount = mysqli_real_escape_string($conn, $_POST['Iamount']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$Enddate = mysqli_real_escape_string($conn, $_POST['Enddate']);
$ScheduleAmount = mysqli_real_escape_string($conn, $_POST['amount_topay']);
$Typecode = "ASSET";
$Branchcode = "Loan";
$Cramount = "0";
$Duration = mysqli_real_escape_string($conn, $_POST['Duration']);
$Orgin = mysqli_real_escape_string($conn, $_POST['Orgin']);
$Special = "loanx";
$TRECEPT = "0";
$Log = mysqli_real_escape_string($conn, $_POST['teller']);
$Scheduleday = mysqli_real_escape_string($conn, $_POST['remark']);




$insert = mysqli_query($conn, "INSERT INTO trans VALUES('','$TRECEPT','$Tdate','$Enddate','$Typecode','$Branchcode','$GroupNo','$ACCNO','$Fullname','$Cramount','$Dramount','$LoanID','$Interestrate','$Iamount','$ScheduleAmount','$Scheduleday','$Description','$Ltype','$Duration','$Orgin','$Special','$status','$agent','$Log')") or die (mysqli_error($conn));
if(!$insert)

{
echo '<meta http-equiv="refresh" content="2;url=newloans.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Unable to Save Loan Information.....Please try again later!</span>';
}
else{
echo '<meta http-equiv="refresh" content="2;url=listloans.php?tid='.$_SESSION['tid'].'">';
echo '<br>';
echo'<span class="itext" style="color: #FF0000">Saving Loan Informatioooooooooon.....4 more steps to complete the request.</span>';
}
}

?>
</div>








</body>
</html>
