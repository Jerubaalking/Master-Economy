<div class="box">

	       <div class="box-body">
			<div class="panel panel-success">
            <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-dollar"></i>&nbsp;New Loans</h3>
            </div>
             <div class="box-body">

			 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="process_loan_info.php">
			  <?php echo '<div class="alert alert-info fade in" >
			  <a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  				<strong>Note that&nbsp;</strong> &nbsp;&nbsp;Some Fields are Rquired.
				</div>'?>
             <div class="box-body">




			 <div class="form-group">
                <label for="" class="col-sm-2 control-label" style="color:#009900">Borrower</label>
				 <div class="col-sm-10">
                <select name="borrower" class="customer select2" style="width: 100%;">
				<option selected="selected">--Select Customer Account--</option>

				<?php
				$get = mysqli_query($conn, "SELECT * FROM borrowers order by id") or die (mysqli_error($conn));
				while($rows = mysqli_fetch_array($get))
				{
				echo '<option value="'.$rows['id'].'">'.$rows['fname'].'</option>';
				}
				?>
                </select>
              </div>
			  </div>


			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Account#</label>
                  <div class="col-sm-10">
                  <select class="account select2" name="account" style="width: 100%;">
				<option selected="selected">--Select Customer Account--</option>
                  <?php
				$getin = mysqli_query($conn, "SELECT * FROM borrowers order by id") or die (mysqli_error($conn));
				while($row = mysqli_fetch_array($getin))
				{
				echo '<option value="'.$row['id'].'">'.$row['account'].'</option>';
				}
				?>
				</select>
                  </div>
                  </div>





				<div class="form-group">
									<label for="" class="col-sm-2 control-label" style="color:#009900">Group</label>
									<div class="col-sm-10">
					<select name="Group1"  class="form-control select2" required style="width:100%">
						<option value="" selected="selected">--Select Group--</option>
					<?php
					$tid = $_SESSION['tid'];
					$get = mysqli_query($conn, "SELECT * FROM borrowers order by id") or die (mysqli_error($conn));
					while($rows = mysqli_fetch_array($get))
					{
					?>
					<option value="<?php echo $rows['Group']; ?>"><?php echo $rows['Group']; ?></option>
					<?php } ?>
					</select>
					</div>
				</div>



		<div class="form-group">
							<label for="" class="col-sm-2 control-label" style="color:#009900">Orgin</label>
							<div class="col-sm-10">
			<select name="Orgin"  class="form-control select2" required style="width:100%">
				<option value="" selected="selected">--Select Orgin of Transaction--</option>
			<?php
			$tid = $_SESSION['tid'];
			$get = mysqli_query($conn, "SELECT * FROM chart") or die (mysqli_error($conn));
			while($rows = mysqli_fetch_array($get))
			{
			?>
			<option value="<?php echo $rows['Transbranch']; ?>"><?php echo $rows['Transbranch']; ?></option>
			<?php } ?>
			</select>
			</div>
		</div>




												<div class="form-group">
																	<label for="" class="col-sm-2 control-label" style="color:#009900">Loan Type</label>
																	<div class="col-sm-10">
													<select name="Ltype"  class="form-control select2" required style="width:100%">
													<?php
													$tid = $_SESSION['tid'];
													$get = mysqli_query($conn, "SELECT * FROM loantype") or die (mysqli_error($conn));
													while($rows = mysqli_fetch_array($get))
													{
													?>
													<option value="<?php echo $rows['typename']; ?>"><?php echo $rows['typename']; ?></option>
													<?php } ?>
													</select>
													</div>
												</div>




												<div class="form-group">
																	<label for="" class="col-sm-2 control-label" style="color:#009900">WEEKDAY</label>
																	<div class="col-sm-10">
																	<select name="remark"  class="form-control" required>
																		<option selected='selected'>MONDAY</option>
																		<option>TUESDAY</option>
																		<option>WEDNESDAY</option>
																		<option>THURSDAY</option>
																		<option>FRIDAY</option>
																	</select>
																		 </div>
																						</div>



		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">LoanID</label>
                  <div class="col-sm-10">
                  <input name="LoanID" type="text" class="form-control" placeholder="LoanID" required>
                  </div>
                  </div>


			<div class="form-group">
							   <label for="" class="col-sm-2 control-label" style="color:#009900">Amount</label>
							    <div class="col-sm-10">
							    <input name="amount" type="text" class="form-control" placeholder="Amount" required>
							    </div>
							    </div>


			<div class="form-group">
							   <label for="" class="col-sm-2 control-label" style="color:#009900">Interest Rate</label>
							    <div class="col-sm-10">
							    <input name="Interestrate" type="text" class="form-control" placeholder="Interest Rate" required>
							    </div>
							    </div>



			<div class="form-group">
								 <label for="" class="col-sm-2 control-label" style="color:#009900">Interest Amount</label>
									<div class="col-sm-10">
									<input name="Iamount" type="text" class="form-control" placeholder="Interest Amount" required>
									</div>
									</div>






		 <div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Description</label>
                  	<div class="col-sm-10">
					<input name="desc"  type="text" class="form-control" rows="4" cols="80"></textarea>
           			 </div>


					 </div>



				<div class="form-group">
						 <label for="" class="col-sm-2 control-label" style="color:#009900">Date Release</label>
		<div class="col-sm-10">
					 <div class="input-group date">
							 <div class="input-group-addon">
								 <i class="fa fa-calendar"></i>
							 </div>
							 <input name="date_release" type="date" class="form-control pull-right" id="datepicker">
						 </div>
					 </div>
		 </div>




			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Agent</label>
                  <div class="col-sm-10">
<?php
$tid = $_SESSION['tid'];
$sele = mysqli_query($conn, "SELECT * from user WHERE id = '$tid'") or die (mysqli_error($conn));
while($row = mysqli_fetch_array($sele))
{
?>
                  <input name="agent" type="text" class="form-control" value="<?php echo $row['name']; ?>" readonly>
<?php } ?>
                  </div>
                  </div>



														 <div class="form-group">
									                  <label for="" class="col-sm-2 control-label" style="color:#009900">Current Balance</label>
									                  <div class="col-sm-10">
									                  <input name="user" type="text" class="form-control" value="0.00" readonly>
									                  </div>
									                  </div>

													   <div class="form-group">
									                <label for="" class="col-sm-2 control-label" style="color:#009900">Payment Date</label>
												 <div class="col-sm-10">
									              <div class="input-group date">
									                  <div class="input-group-addon">
									                    <i class="fa fa-calendar"></i>
									                  </div>
									                  <input name="Enddate" type="date" class="form-control pull-right" id="datepicker2">
									                </div>
									              </div>
												  </div>

													  <div class="form-group">
									                  <label for="" class="col-sm-2 control-label" style="color:#009900">Duration</label>
									                  <div class="col-sm-10">
									                  <input name="	Duration" type="number" class="form-control" placeholder="Duration" >
									                  </div>
									                  </div>


																		<div class="form-group">
													                  <label for="" class="col-sm-2 control-label" style="color:#009900">Amount to Pay</label>
													                  <div class="col-sm-10">
													                  <input name="amount_topay" type="text" class="form-control" placeholder="Amount to Pay" >
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




														<div class="form-group">
																	 <label for="" class="col-sm-2 control-label" style="color:#009900">Transtype</label>
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




														 <div class="form-group">
																		 <label for="" class="col-sm-2 control-label" style="color:#009900">Branchcode</label>
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
												 </div>





			  <div align="right">
              <div class="box-footer">
                				<button type="reset" class="btn btn-primary btn-flat"><i class="fa fa-times">&nbsp;Reset</i></button>
                				<button name="save_loan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>

              </div>
			  </div>
			  </form>



</div>
</div>
</div>
</div>
