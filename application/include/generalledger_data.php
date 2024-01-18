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

					     	<a href="print_general_ledger.php" target="_blank" class="btn btn-info btn-flat"><i class="fa fa-print"></i>&nbsp;Print</a>

					     	<a href="exportloan.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>

					 	<hr>

			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>DATE</th>
									<th>DEBIT</th>
				  				<th>CREDIT</th>
                 </tr>
                </thead>
                <tbody>
<?php
$tid = $_SESSION['tid'];
$select = mysqli_query($conn, "SELECT *, SUM(Cramount) as cr, SUM(dramount) as dr FROM trans WHERE Tdate > '2022-12-31' AND Tdate <= '2023-03-31' GROUP BY Branchcode") or die (mysqli_error($conn));



if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{
$ID  = $row['ID'];
$Dramount = $row['Dramount'];
$Cramount = $row['Cramount'];
$Fullname = $row['Fullname'];
$Branchcode = $row['Branchcode'];
$Tdate = $row['Tdate'];
$ACCNO = $row['ACCNO'];
$cr = $row['cr'];
$dr = $row['dr'];

?>
                <tr>
        <td><?php echo $Branchcode; ?></td>
				<td><?php echo number_format($dr,2,'.',','); ?></td>
				<td><?php echo number_format($cr,2,'.',','); ?></td>
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
						echo "<script>window.location='mywallet.php?id=".$_SESSION['tid']."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($link,"DELETE FROM mywallet WHERE id ='$id[$i]'");
								echo "<script>alert('Row Delete Successfully!!!'); </script>";
								echo "<script>window.location='mywallet.php?id=".$_SESSION['tid']."'; </script>";
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
