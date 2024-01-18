<div class="box">
	      <div class="box-body">
			<div class="panel panel-success">
            <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-dollar"></i> New Loan Type</h3>
            </div>
             <div class="box-body">

			 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="process_loantype.php">
			  <?php echo '<div class="alert alert-info fade in" >
			  <a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  				<strong>Note that&nbsp;</strong> &nbsp;&nbsp;Some Fields are Rquired.
				</div>'?>
             <div class="box-body">





		 <div class="form-group">
								 <label for="" class="col-sm-2 control-label" style="color:#009900">Type Name</label>
								 <div class="col-sm-10">
								 <input name="typename" type="text" class="form-control" placeholder="Loan Type Name" required>
								 </div>
								 </div>


	<div class="form-group">
								<label for="" class="col-sm-2 control-label" style="color:#009900">Interest Method</label>
								<div class="col-sm-10">
			<select name="method"  class="form-control" required>
									<option value="">Select Interest Method</option>
									<option value="Flat Rate">Flat Rate</option>
									<option value="Reducing method">Reducing method</option>
								</select>
								 </div>
												 </div>


			<div class="form-group">
								<label for="" class="col-sm-2 control-label" style="color:#009900">schedule mode</label>
								<div class="col-sm-10">
			<select name="schedulemode"  class="form-control" required>
									<option value="">Select schedule mode</option>
									<option value="Daily">Daily</option>
									<option value="Weekly">Weekly</option>
									<option value="Monthly">Monthly</option>
								</select>
								 </div>
												 </div>

2
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Interest Rate#</label>
                  <div class="col-sm-10">
                  <input name="interestrate" type="number" class="form-control" placeholder="Interest Rate" required>
                  </div>
                  </div>










		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Teller By</label>
                  <div class="col-sm-10">
                 <?php
$tid = $_SESSION['tid'];
$sele = mysqli_query($conn, "SELECT * from user WHERE id = '$tid'") or die (mysqli_error($conn));
while($row = mysqli_fetch_array($sele))
{
?>
                  <input name="teller" type="text" class="form-control" value="<?php echo $row['name']; ?>" readonly>
<?php } ?>
                  </div>
                  </div>



<div align="right">
      <div class="box-footer">
        				<button type="reset" class="btn btn-primary btn-flat"><i class="fa fa-times">&nbsp;Reset</i></button>
        				<button name="saveloantype" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Add To Chart</i></button>

      </div>
</div>
</form>



</div>
</div>
</div>
</div>
