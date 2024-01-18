<?php include "../config/session.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <?php
$call = mysqli_query($conn, "SELECT * FROM systemset");
if(mysqli_num_rows($call) == 0)
{
echo "<script>alert('Data Not Found!'); </script>";
}
else
{
while($row = mysqli_fetch_assoc($call)){
?>

<link href="../img/<?php echo $row['image']; ?>" rel="icon" type="dist/img">
<?php }}?>
  <?php
	$call = mysqli_query($conn, "SELECT * FROM systemset");
	while($row = mysqli_fetch_assoc($call)){
	?>
  <title><?php echo $row ['title']?></title>
  <?php }?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <strong> <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css"></strong>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->





  




</head>
<body onLoad="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <br>
  <?php
		 $result= mysqli_query($conn,"select * from systemset")or die(mysqli_error());
		 while($row=mysqli_fetch_array($result))
		 {
		 ?>
		   <div align="center"><img src="../img/<?php echo $row['image'];?>" width="40" height="40" class="user-image" alt="User Image">
		 <?php }?>
		 </div>
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">

		 <?php
		 $sql = "SELECT * FROM systemset";
		 $result = mysqli_query($conn,$sql);
		 while ($row=mysqli_fetch_array($result))
		{
?>
           <div style="color:#009900"><div style="font-size:20px"><div align="center"><?php echo '&nbsp;&nbsp;&nbsp;'. $row ['name'];?></div></div></div>
		   <small class="pull-left"><div style="color:#009900">DAILY REPORT, August 1, 2022</div></small>
          <small class="pull-right"><div style="color:#009900"><?php $today = date ('y:m:d');
		  								  $new = date ('l, F, d, Y', strtotime($today));
										      echo $new;?></div>
		</small>
        </h2>
		<?php
		}
		?>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->

    <!-- Table row -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <!--<h3 class="box-title">Payment table</h3>-->

			  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
            </div>
	            <div class="box-body table-responsive">



			  



  
       <table id="example1" class="table table-bordered table-striped">
                <thead>
          <tr>
          <th><input type="checkbox" id="select_all"/></th>
          <th>ID</th>
          <th>REC.</th>
          <th>DEBIT</th>
          <th>CREDIT</th>
          <th>BALANCE</th>
                 </tr>
                </thead>
                <tbody>


                
<?php
$tid = $_SESSION['tid'];

$select = mysqli_query($conn, "SELECT * FROM trans WHERE ACCNO='100' and Branchcode='Loan' ORDER BY Tdate") or die (mysqli_error($conn));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
  $tempCredit;
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
$GroupNo = $row['GroupNo'];
$TRECEPT = $row['TRECEPT'];
$Branchcode = $row['Branchcode'];
$select1 = mysqli_query($conn, "SELECT * FROM systemset") or die (mysqli_error($conn));
$tempCredit;
$tempDebit;
$tempDebit = $row['Dramount'] + $row['Iamount'];
$tempCredit = $tempCredit + $tempDebit - $row['Cramount'];


while($row1 = mysqli_fetch_array($select1))
{
$Cramount1 = $Cramount - $Cramount;
$currency = $row1['currency'];
?>
                <tr>
        <td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
        <td><?php echo $Tdate; ?></td>
        <td><?php echo $TRECEPT; ?></td>
        <td><?php echo $tempDebit; ?></td>
        <td><?php echo $Cramount; ?></td>
        <td><?php echo $tempCredit ?></td>
          </tr>
<?php } } } ?>
             </tbody>
                </table>


                
				</div>

              <div class="box-footer">
	 <button type="button" onClick="window.print();" class="btn btn-warning pull-right" ><i class="fa fa-print"></i>Print</button>

            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script --><script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>