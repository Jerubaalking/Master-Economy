<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<title></title>
<style id = "table_style" type="text/css">
		body
		{
				font-family: Arial;
				font-size: 9pt;
		}
		table
		{
				border: 1px solid #ccc;
				border-collapse: collapse;
		}
		table th
		{
				background-color: #F7F7F7;
				color: #633;
				font-weight: bold;
		}
		table th, table td
		{
				padding: 8px;
				border: 1px solid #ccc;
		}
</style>
<script type="text/javascript">
		function PrintTable() {
				var printWindow = window.open('', '', 'height=2000,width=100');
				printWindow.document.write('<html><head><title>Table Contents</title>');

				//Print the Table CSS.
				var table_style = document.getElementById("table_style").innerHTML;
				printWindow.document.write('<style type = "text/css">');
				printWindow.document.write(table_style);
				printWindow.document.write('</style>');
				printWindow.document.write('</head>');

				//Print the DIV contents ie. the HTML Table.
				printWindow.document.write('<body>');
				var example1 = document.getElementById("example1").innerHTML;
				printWindow.document.write(example1);
				printWindow.document.write('</body>');

				printWindow.document.write('</html>');
				printWindow.document.close();
				printWindow.print();
		}
</script>






</body>
</html>




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

	<a  onclick="PrintTable();"  target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i>&nbsp;Print Payments</a>
	<a href="excelpayment.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>

	<hr>


		<form class="form-inline" method="POST" action="">




									<select id="date1"  name="date1" class="borwser-default select2">
										<option value=""></option>
										<?php
										$employee = $conn->query("SELECT *,concat(fname) as ename FROM borrowers order by concat(fname) asc");
										while($row = $employee->fetch_assoc()):
										?>
											<option value="<?php echo $row['ename'] ?>"><?php echo $row['ename']?></option>
										<?php endwhile; ?>
									</select>


									<select id="date2"  name="date2" class="borwser-default select2">
										<option value=""></option>
										<?php
										$employee = $conn->query("SELECT *,concat(Transbranch) as ename FROM chart order by concat(Transbranch) asc");
										while($row = $employee->fetch_assoc()):
										?>
											<option value="<?php echo $row['Transbranch'] ?>"><?php echo $row['Transbranch']?></option>
										<?php endwhile; ?>
									</select>

			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="listpayment.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>

				<input type="button" onclick="PrintTable();" value="Print" />

		</form>




								<div id="example1">
						        <table cellspacing="0" rules="all" border="1">

											<thead>
								<tr>
              CAVA MICROFINANCE LTD
											 </tr>
											</thead>
											<thead>
								<tr>
								<th>REC</th>
								<th>DATE</th>
								<th>Customerfull_nnames</th>
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


										<tbody>
									 </tbody>


						        </table>
						    </div>
















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




</body>
</html>
