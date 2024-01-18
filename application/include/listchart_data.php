<div class="row">

		    <section class="content">
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">
<form method="post">
			 <a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a>
	 <button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Delete</button>
	<a href="newpayments.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("408"); ?>"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-dollar"></i>&nbsp;New chart</button></a>

	<a href="printpayment.php" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i>&nbsp;Print chart</a>
	<a href="excelpayment.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>

	<?php
	$check = mysqli_query($conn, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Internal Message'") or die ("Error" . mysqli_error($conn));
	$get_check = mysqli_fetch_array($check);
	$pdelete = $get_check['pdelete'];
	$pread = $get_check['pread'];
	$pcreate = $get_check['pcreate'];
	$pupdate = $get_check['pupdate'];
	?>

	<hr>

	<table id="example1" class="table table-bordered table-striped">
					 <thead>
					 <tr>
						 <th><input type="checkbox" id="select_all"/></th>
						 <th>ID</th>
						 <th>Typecode</th>
						 <th>Transtype</th>
		         <th>Branchcode</th>
						 <th>Transbranch</th>
						 <th>Actions</th>
						</tr>
					 </thead>
					 <tbody>
<?php
$tid = $_SESSION['tid'];
$select = mysqli_query($conn, "SELECT * FROM chart") or die (mysqli_error($conn));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{
$ID = $row['ID'];
$Typecode = $row['Typecode'];
$Transtype = $row['Transtype'];
$Branchcode = $row['Branchcode'];
$Transbranch = $row['Transbranch'];
$Branchcode = $row['Branchcode'];
?>
					 <tr>
	 <td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
	 <td><?php echo $ID; ?></td>
	 <td><?php echo $Typecode; ?></td>
	 <td><?php echo $Transtype; ?></td>
	 <td><?php echo $Branchcode; ?></td>
	 <td><?php echo $Transbranch; ?></td>
	 <td><?php echo ($pupdate == '1') ? '<a href="view_chart.php?id='.$id.'&&mid='.base64_encode("406").'"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-eye"></i>&nbsp;View</button></a>' : ''; ?></td>

		 </tr>
<?php } } ?>
				</tbody>
					 </table>
<?php
			 if(isset($_POST['delete'])){
			 $idm = $_GET['id'];
				 $id=$_POST['selector'];
				 $N = count($id);
			 if($id == ''){
			 echo "<script>alert('Row Not Selected!!!'); </script>";
			 echo "<script>window.location='inboxmessage.php?id=".$_SESSION['tid']."&&mid=".base64_encode("406")."'; </script>";
				 }
				 else{
				 for($i=0; $i < $N; $i++)
				 {
					 $result = mysqli_query($conn,"DELETE FROM chart WHERE id ='$id[$i]'");
					 echo "<script>alert('Row Delete Successfully!!!'); </script>";
					 echo "<script>window.location='inboxmessage.php?id=".$_SESSION['tid']."&&mid=".base64_encode("406")."'; </script>";
				 }
				 }
				 }
?>

</form>

				 </div>








			<div class="box box-info">
            <div class="box-body">
            <div class="alert alert-info" align="center" class="style2" style="color: #FFFFFF">NUMBER CHART OF ACCOUNTSS:&nbsp;
			<?php
			$call3 = mysqli_query($conn, "SELECT * FROM chart ");
			$num3 = mysqli_num_rows($call3);
			?>
			<?php echo $num3; ?>

			</div>

			 <div id="chartdiv1"></div>
			</div>
			</div>

</div>
