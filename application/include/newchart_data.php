<div class="box">
	      <div class="box-body">
			<div class="panel panel-success">
            <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-dollar"></i> New Payment</h3>
            </div>
             <div class="box-body">

			 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="process_chart.php">
			  <?php echo '<div class="alert alert-info fade in" >
			  <a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  				<strong>Note that&nbsp;</strong> &nbsp;&nbsp;Some Fields are Rquired.
				</div>'?>
             <div class="box-body">

			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Transcode##</label>
                  <div class="col-sm-10">
                  <input name="transcode" type="text" class="form-control" placeholder="Transaction code" required>
                  </div>
                  </div>


				<div class="form-group">
											<label for="" class="col-sm-2 control-label" style="color:#009900">State</label>
											<div class="col-sm-10">
						<select name="transtype"  class="form-control" required>
												<option value="">Select Transaction Type</option>
												<option value="ASSET">ASSET</option>
												<option value="LIABILITY">LIABILITY</option>
												<option value="EQUITY">EQUITY</option>
												<option value="INCOME">INCOME</option>
												<option value="EXPENSE">EXPENSE</option>
											</select>
											 </div>
															 </div>

2
		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Branch code#</label>
                  <div class="col-sm-10">
                  <input name="branchcode" type="number" class="form-control" placeholder="Branch code" required>
                  </div>
                  </div>



		<div class="form-group">
								<label for="" class="col-sm-2 control-label" style="color:#009900">Transaction Branch</label>
								<div class="col-sm-10">
								<input name="transbranch" type="text" class="form-control" placeholder="Transaction Branch" required>
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
        				<button name="savechart" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Add To Chart</i></button>

      </div>
</div>
</form>



</div>
</div>
</div>
</div>
