<div class="row">
		    <section class="content">
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
              	 <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
             <div class="box-body">
           		<form method="post">
			 <a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a>
	 <button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Delete</button>
	<a href="newpayments.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("408"); ?>"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-dollar"></i>&nbsp;New Payment</button></a>

	<a href="printpayment.php" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i>&nbsp;Print Payments</a>
	<a href="excelpayment.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>

	<hr>



		<form class="form-inline" method="POST" action="">






                  <input id="date1" name="date1" type="text" placeholder="Full Name" required>





			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="listpayment.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>


		</form>


			 <table id="example1" class="table table-bordered table-striped">
                <thead>
          <tr>
          <th>REC</th>
          <th>DATE</th>
          <th>Customer</th>
				  <th>Group</th>
          <th>Transaction Type</th>
				  <th>DEBIT</th>
          <th>CREDIT</th>
          <th>ACCUMULATIVE</th>
                 </tr>
                </thead>
                <tbody>

              <?php include'range3.php'?>

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
			$call3 = mysqli_query($conn, "SELECT * FROM payments ");
			$num3 = mysqli_num_rows($call3);
			?>
			<?php echo $num3; ?>
			</div>
			 <div id="chartdiv1"></div>
			</div>
			</div>
</div>
