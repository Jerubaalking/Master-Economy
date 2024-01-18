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
		   <div align="center"><img src="../img/<?php echo $row['image'];?>" width="80" height="80" class="user-image" alt="User Image">
		 <?php }?>
		 </div>
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
		 <?php
		 $sql = "SELECT * FROM systemset";
		 $result = mysqli_query($conn,$sql);
		 while ($row=mysqli_fetch_array($result))
		{
?>
           <div style="color:#009900"><div style="font-size:15px"><div align="center"><?php echo '&nbsp;&nbsp;&nbsp;'. $row ['name'];?></div></div></div>
		   <small class="pull-left"><div style="color:#009900">Clients Balance</div></small>
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
                          $('table tfoot td').eq(index).text(+ total);
                      }
                  </script>



                         <thead>
                         <tr>
                           <th>ACC NO.</th>
         									<th>FULLNAME</th>
         									<th>TOTAL DISBUSMENT</th>
         				  				<th>TOTAL INTEREST</th>
                           <th>TOTAL LOAN</th>
                           <th>TOTAL REPAYMENT</th>
                           <th>BALANCE</th>
                          </tr>
                         </thead>
                         <tbody>
         <?php

         $tid = $_SESSION['tid'];
         $select = mysqli_query($conn, "SELECT *, max(Tdate) as Tdatex, SUM(Cramount) as cr, SUM(Cramount)*100/130 as ppaid, SUM(Cramount)*30/130 as ipaid, SUM(dramount) as dr, SUM(Iamount) as interest, SUM(dramount + Iamount) as totalloan, SUM(dramount + Iamount - Cramount) as balance FROM trans WHERE Branchcode = 'loan'  GROUP BY Fullname ORDER BY GroupNo") or die (mysqli_error($conn));

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
         $GroupNo = $row['GroupNo'];
         $cr = $row['cr'];
         $ppaid = $row['ppaid'];
         $dr = $row['dr'];
         $balance = $row['balance'];
         $interest = $row['interest'];
         $ipaid = $row['ipaid'];
         $totalloan = $row['totalloan'];
         $Tdatex = $row['Tdatex'];

         ?>
                         <tr>
         				<td><?php echo $GroupNo; ?></td>
         				<td><?php echo $Fullname; ?></td>
                 <td><?php echo $dr; ?></td>
                 <td><?php echo $interest; ?></td>
                 <td><?php echo $totalloan; ?></td>
                 <td><?php echo $cr; ?></td>
                 <td><?php echo $balance; ?></td>

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
                         <td></td>
                         <td></td>
                         <td> </td>
                         <td></td>
                         <td></td>
                     </tr>
                 </tfoot>



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
