<div class="row">
		    <section class="content">
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">
<form method="post">
	<a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a>
<?php
$check = mysqli_query($conn, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Employee Wallet'") or die ("Error" . mysqli_error($conn));
$get_check = mysqli_fetch_array($check);
$pdelete = $get_check['pdelete'];
$pcreate = $get_check['pcreate'];
$pupdate = $get_check['pupdate'];
?>
	<?php echo ($pdelete == '1') ? '<button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Multiple Delete</button>' : ''; ?>
	<?php echo ($pupdate == '1') ? '<button data-target= "#c" data-toggle="modal" type="button" class="btn btn-flat btn-info"><i class="fa fa-dollar"></i>&nbsp;Transfer Money</button>' : ''; ?>
	<?php echo ($pcreate == '1') ? '<button data-target= "#b" data-toggle="modal" type="button" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>&nbsp;Add New Wallet</button>' : ''; ?>
	<button type="button" class="btn btn-flat btn-info" disabled>&nbsp;Total Wallets:&nbsp;
<strong class="alert alert-success">
<?php
$tid = $_SESSION['tid'];
$select = mysqli_query($conn, "SELECT Total FROM twallet WHERE tid = '$tid'") or die (mysqli_error($conn));
if(mysqli_num_rows($select)==0)
{
echo "0.00";
}
else{
while($row = mysqli_fetch_array($select))
{
$select1 = mysqli_query($conn, "SELECT * FROM systemset") or die (mysqli_error($conn));
while($row1 = mysqli_fetch_array($select1))
{
$currency = $row1['currency'];
echo $currency.number_format($row['Total'],2,".",",")."</b>";
}
}
}
?>
</strong>
	</button>

	<hr>

			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"/></th>
									<th>DATE</th>
                  <th>TRANSACTION</th>
									<th>DEBIT</th>
				  				<th>CREDIT</th>
                  <th>BALANCE</th>
                 </tr>
                </thead>
                <tbody>
<?php
$tid = $_SESSION['tid'];
$select = mysqli_query($conn, "SELECT * FROM trans") or die (mysqli_error($conn));
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
$Branchcode = $row['Branchcode'];

?>
                <tr>
			  <td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
        <td><?php echo $Branchcode; ?></td>
				<td><?php echo number_format($Dramount,2,'.',','); ?></td>
				<td><?php echo number_format($Cramount,2,'.',','); ?></td>
				<td><?php echo number_format($Cramount,2,'.',','); ?></td>
<?php



if($Cramount == "0" || $Cramount == "0"|| $Dramount == "0.00")
{
?>
				<td><?php echo ($pdelete == '1') ? '<a href="#d'.$id.'"><button data-target= "#d'.$ID.'" data-toggle="modal" type="button" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button></a>' : ''; ?></td>
<?php
}
else{
?>
    			<td><?php echo ($pdelete == '1') ? '<button data-target= "#c" data-toggle="modal" type="button" class="btn btn-flat btn-danger" disabled="disabled"><i class="fa fa-trash"></i>&nbsp;Delete</button>' : ''; ?></td>
<?php } ?>
			    </tr>
<?php } } ?>
             </tbody>
                </table>


</form>

              </div>



</div>
</div>
</div>
</div>
