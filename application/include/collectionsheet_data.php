<div class="row">

		    <section class="content">
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">
<form method="post">
			 <a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a>
	 <button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Delete</button>
	<a href="newpayments.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("408"); ?>"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-dollar"></i>&nbsp;New Payment</button></a>

	<a href="printpayment.php" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i>&nbsp;Print Payments</a>
	<a href="excelpayment.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>

	<hr>




	<div class="form-group">
						<label for="" class="col-sm-2 control-label" style="color:#009900">Select Day</label>
						<div class="col-sm-10">
						<select name="martial"  class="form-control" required>
							<option selected='selected'>MONDAY</option>
							<option>MONDAY</option>
							<option>TUESDAY</option>
							<option>WENSDAY</option>
							<option>THURSDAY</option>
							<option>FRIDAY</option>
							<option>SATURDAY</option>
							<option>SUNDAY</option>
						</select>
							 </div>
											</div>







			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"/></th>
                  <th>ID</th>
                  <th>Customer</th>
				  <th>Group</th>
          <th>Transaction Type</th>
				  <th>Amount</th>
          <th>Date</th>
				  <th>Teller</th>
          <th>Actions</th>
                 </tr>
                </thead>
                <tbody>
<?php
$tid = $_SESSION['tid'];
$select = mysqli_query($conn, "SELECT * FROM trans WHERE GroupNo= '17' ORDER BY Tdate") or die (mysqli_error($conn));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{
$ID = $row['ID'];
$Fullname = $row['Fullname'];





//$accte = $have['account'];
$Cramount = $row['Cramount'];
$Dramount = $row['Dramount'];
$ScheduleAmount = $row['ScheduleAmount'];
$Tdate = $row['Tdate'];
$GroupNo = $row['GroupNo'];
$TRECEPT = $row['TRECEPT'];
$Branchcode = $row['Branchcode'];
$select1 = mysqli_query($conn, "SELECT * FROM systemset") or die (mysqli_error($conn));

while($row1 = mysqli_fetch_array($select1))
{
$Cramount1 = $Cramount - $Cramount;
$currency = $row1['currency'];
?>
                <tr>
                <td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
        <td><?php echo $Tdate; ?></td>
				<td><?php echo $Fullname; ?></td>
				<td><?php echo $GroupNo; ?></td>
        <td><?php echo $Branchcode; ?></td>
				<td><?php echo $currency.number_format($Dramount,2,".",","); ?></td>
				<td><?php echo $currency.number_format($Cramount,2,".",","); ?></td>
				<td><?php echo $TRECEPT; ?></td>
        <td><a href="view_pmt.php?id=<?php echo $id;?>"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-eye"></i>&nbsp;View</button></a></td>
			    </tr>
<?php } } } ?>
             </tbody>
                </table>

<?php
						if(isset($_POST['delete'])){
						$idm = $_GET['id'];
							$id=$_POST['selector'];
							$N = count($id);
						if($id == ''){
						echo "<script>alert('Row Not Selected!!!'); </script>";
						echo "<script>window.location='listpayment.php?id=".$_SESSION['tid']."&&mid=".base64_encode("408")."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($conn,"DELETE FROM trans WHERE id ='$id[$i]'");
								echo "<script>alert('Row Delete Successfully!!!'); </script>";
								echo "<script>window.location='listpayment.php?id=".$_SESSION['tid']."&&mid=".base64_encode("408")."'; </script>";
							}
							}
							}
?>

</form>
                </div>

				</div>
				</div>

</div>

			<div class="box box-info">
            <div class="box-body">
            <div class="alert alert-info" align="center" class="style2" style="color: #FFFFFF">NUMBER OF LOAN APPLICANTS:&nbsp;
			<?php
			$call3 = mysqli_query($conn, "SELECT * FROM borrowers ");
			$num3 = mysqli_num_rows($call3);
			?>
			<?php echo $num3; ?>

			</div>

			 <div id="chartdiv1"></div>
			</div>
			</div>

</div>
