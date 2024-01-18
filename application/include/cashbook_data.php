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
            $('table tfoot td').eq(index).text(' ' + total);
        }
    </script>










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
                  <th>ACC NO.</th>
									<th>FULLNAME</th>
									<th>DEBIT</th>
				  				<th>CREDIT</th>
                  <th>Actions</th>
                 </tr>
                </thead>
                <tbody>
<?php

$tid = $_SESSION['tid'];
$select = mysqli_query($conn, "SELECT *, Cramount as cr, dramount as dr FROM trans ORDER BY Tdate") or die (mysqli_error($conn));

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
			  <td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
				<td><?php echo $Tdate; ?></td>
        <td><?php echo $Branchcode; ?></td>
				<td><?php echo $ACCNO; ?></td>
				<td><?php echo $Fullname; ?></td>
        <td><?php echo $dr; ?></td>
        <td><?php echo $cr; ?></td>
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








                     <tfoot>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        </tfoot>









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
