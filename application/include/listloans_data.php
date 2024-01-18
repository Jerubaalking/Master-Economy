<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
		$(document).ready(function() {
				$('table thead th').each(function(i) {
						calculateColumn(i);
				});
		});

		function calculateColumn(index) {
				var total = 0;
				$('table tr').each(function() {
						var value = parseInt($('td', this).eq(index).text());
						if (!isNaN(value)) {
								total += value;
						}
				});
				$('table tfoot td').eq(index).text('Total: ' + total);
		}
</script>


<div class="row">
		    <section class="content">
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">




<form method="post">
			 <a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a>
<?php
$check = mysqli_query($conn, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Loan Details'") or die ("Error" . mysqli_error($conn));
$get_check = mysqli_fetch_array($check);
$pdelete = $get_check['pdelete'];
$pcreate = $get_check['pcreate'];
$pupdate = $get_check['pupdate'];
?>
	<?php echo ($pdelete == '1') ? '<button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Multiple Delete</button>' : ''; ?>
	<?php echo ($pcreate == '1') ? '<a href="newloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>&nbsp;Add Loans</button></a>' : ''; ?>
<?php
$get = mktime(0,0,0,date("m"),date("d"),date("Y"));
$date = date("d/m/Y",$get);
$select = mysqli_query($conn, "SELECT * FROM trans WHERE Special= 'loanx' ORDER BY GroupNo") or die (mysqli_error($conn));
$num = mysqli_num_rows($select);
?>
	<button type="button" class="btn btn-flat btn-danger"><i class="fa fa-times"></i>&nbsp;Overdue:&nbsp;<?php echo number_format($num,0,'.',','); ?></button>

	<a href="printloan.php" target="_blank" class="btn btn-info btn-flat"><i class="fa fa-print"></i>&nbsp;Print</a>
	<a href="exportloan.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>



	<hr>

			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"/></th>
									<th>date Release</th>
				          <th>Customer</th>
                  <th>Group No.</th>
                  <th>Amount</th>
                  <th>Interest</th>
                  <th>Loan Type</th>
									<th>Agent</th>
									<th>Action</th>
                 </tr>
                </thead>
                <tbody>
<?php
$select = mysqli_query($conn, "SELECT * FROM trans WHERE Special= 'loanx' ORDER BY Tdate") or die (mysqli_error($conn));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{
$Fullname = $row['Fullname'];
$status = $row['status'];
$agent = $row['agent'];
$upstatus = $row['status'];
$ACCNO = $row['ACCNO'];
$GroupNo = $row['GroupNo'];
$Tdate = $row['Tdate'];
$upstatus = $row['status'];

?>
<?php
if($upstatus == "Pending")
{
?>
                <tr>
				<td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
				<td><?php echo $row['Tdate']; ?></td>
				<td><?php echo $row['Fullname']; ?></td>
        <td><?php echo $row['GroupNo']; ?></td>
				<td><?php echo $row['Dramount']; ?></td>
				<td><?php echo $row['Iamount']; ?></td>
        <td><?php echo $row['Ltype']; ?></td>
				<td><?php echo $row['agent']; ?></td>

			<td>
			<?php echo ($pupdate == '1') ? '<a href="#myModal '.$id.'"> <button type="button" class="btn btn-primary btn-flat" data-target="#myModal'.$id.'" data-toggle="modal"><i class="fa fa-edit"></i></button></a>' : ''; ?>
			<?php echo ($pupdate == '1') ? '<a href="updateloans.php?id='.$id.'&&mid='.base64_encode("405").'"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-eye"></i></button></a>' : ''; ?>
<?php
$se = mysqli_query($conn, "SELECT * FROM attachment WHERE get_id = '$borrower'") or die (mysqli_error($conn));
while($gete = mysqli_fetch_array($se))
{
?>
				<a href="<?php echo $gete['attached_file']; ?>"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-download"></i></button></a></td>
<?php } ?>

			    </tr>
<?php
}
else{
?>
				<tr>
				<td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
				<td><?php echo $row['Tdate']; ?></td>
				<td><?php echo $row['Fullname']; ?></td>
        <td><?php echo $row['GroupNo']; ?></td>
				<td><?php echo $row['Dramount']; ?></td>
				<td><?php echo $row['Iamount']; ?></td>
        <td><?php echo $row['Ltype']; ?></td>
				<td><?php echo $row['agent']; ?></td>

				<td>
				<?php echo ($pupdate == '1') ? '<a href="#myModal '.$id.'"> <button type="button" class="btn btn-primary btn-flat" data-target="#myModal'.$id.'" data-toggle="modal"><i class="fa fa-edit"></i></button></a>' : ''; ?>
			<?php echo ($pupdate == '1') ? '<a href="updateloans.php?id='.$id.'&&mid='.base64_encode("405").'"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-eye"></i></button></a>' : ''; ?>
<?php
$se = mysqli_query($conn, "SELECT * FROM attachment WHERE get_id = '$ACCNO'") or die (mysqli_error($conn));
while($gete = mysqli_fetch_array($se))
{
?>
				<a href="<?php echo $gete['attached_file']; ?>"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-download"></i></button></a>
<?php } ?>
				</td>
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
						echo "<script>window.location='listloans.php?id=".$_SESSION['tid']."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($conn,"DELETE FROM loan_info WHERE id ='$id[$i]'");
								echo "<script>alert('Row Delete Successfully!!!'); </script>";
								echo "<script>window.location='listloans.php?id=".$_SESSION['tid']."'; </script>";
							}
							}
							}
?>

</form>

              </div>
</div>
</div>
</div>
</div>
