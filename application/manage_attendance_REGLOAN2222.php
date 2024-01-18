<?php include 'connect.php' ?>

<?php ?>

<div class="container-fluid1">
	<div class="col-lg-12">
	<form action="" id="employee-attendance">
		<div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Employee</label>
				<select id="TRECEPT" class="borwser-default select2">
					<option value=""></option>
					<?php
					$employee = $conn->query("SELECT *,concat(fname) as ename FROM borrowers order by concat(fname) asc");
					while($row = $employee->fetch_assoc()):
					?>
						<option value="<?php echo $row['ename'] ?>"><?php echo $row['ename']?></option>
					<?php endwhile; ?>
				</select>
			</div>





			<div class="col-md-3">
				<label for="" class="control-label">Type</label>
				<select id="Branchcode" class="borwser-default custom-select">
					<option value="Loan">Loan</option>
					<option value="LOAN FORM">LOAN FORM</option>
					<option value="VISITING FEE">VISITING FEE</option>
					<option value="LOAN INSURANCE & EXPENSES">LOAN INSURANCE & EXPENSES</option>
					<option value="USAFI">USAFI</option>
					<option value="ULINZI">ULINZI</option>
					<option value="TRA">TRA</option>
					<option value="STATIONARY">STATIONARY</option>
					<option value="SALARY">SALARY</option>
					<option value="PETROL">PETROL</option>
					<option value="OFFICE EQUIPMENTS">OFFICE EQUIPMENTS</option>
					<option value="NAULI">NAULI</option>
					<option value="FOOD & DRINKS">FOOD & DRINKS</option>
					<option value="MAWASILIANO">MAWASILIANO</option>
					<option value="POSHO">POSHO</option>
				</select>
			</div>



			<div class="col-md-3">
				<label for="" class="control-label">Date</label>
				<input type="text" id="Tdate" class="form-control datetimepicker" autocomplete="off">
			</div>
			<div class="col-md-2">
				<label for="" class="control-label">&nbsp</label>
				<button class="btn btn-primary btn-block btn-sm" type="button" id="add_list"> Add to List</button>
			</div>
		</div>



		<hr>
		<div class="row">
			<table class="table table-bordered" id="attendance-list">
				<thead>
					<tr>
						<th class="text-center">
							DATE
						</th>
						<th class="text-center">
							REC.
						</th>
						<th class="text-center">
							FULLNAME
						</th>
						
						<th class="text-center">
							AMOUNT
						</th>
						<th class="text-center">
							GROUP
						</th>

						<th class="text-center">
							ACCNO
						</th>

						<th class="text-center">
							LID
						</th>

						<th class="text-center">
							TRANS
						</th>

						<th class="text-center">

						</th>
					</tr>
				</thead>



				<tbody>

				</tbody>
			</table>
		</div>
	</form>
	</div>
</div>


<div id="tr_clone" style="display: none">
	<table>

<tr>

		<?php

$select = mysqli_query($conn, "SELECT * FROM trans WHERE Special= 'loanx' ORDER BY GroupNo") or die (mysqli_error($conn));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{
$ID = $row['ID'];
$Fullname = $row['Fullname'];
//$accte = $have['account'];
$ScheduleAmount = $row['ScheduleAmount'];
$Cramount = $row['Cramount'];
$Dramount = $row['Dramount'];
$ScheduleAmount = $row['ScheduleAmount'];
$Tdate = $row['Tdate'];
$GroupNo = $row['GroupNo'];
$ACCNO = $row['ACCNO'];
$TRECEPT = $row['TRECEPT'];
$LoanID = $row['LoanID'];
$Orgin = $row['Orgin'];
$Special = $row['Special'];
$Scheduleday = $row['Scheduleday'];
$Iamount = $row['Iamount'];
$LoanID = $row['LoanID'];
$Branchcode = $row['Branchcode'];
$select1 = mysqli_query($conn, "SELECT * FROM systemset") or die (mysqli_error($conn));
while($row1 = mysqli_fetch_array($select1))
{
$Cramount1 = $Cramount - $Cramount;
$currency = $row1['currency'];
?>
		<td><input name="Tdate[]" type = "date" size ="1" value="<?php echo $Tdate; ?>"></td>

		<td><input name="TRECEPT[]"  value="<?php echo $TRECEPT; ?>" size ="1"></td>

		<td><input name="Fullname[]"  size ="16" value="<?php echo $Fullname; ?>"></td>

		<td><input name="ScheduleAmount[]"  size ="6" value="<?php echo $ScheduleAmount; ?>"></td>

		<td><input name="GroupNo[]"  size ="1" value="<?php echo $GroupNo; ?>"></td>	

		<td><input name="ACCNO[]"  size ="1" value="<?php echo $ACCNO; ?>"></td>

		<td><input name="LoanID[]"  size ="1" value="<?php echo $LoanID; ?>"></td>

		<td><input name="Branchcode[]" size ="1" value="<?php echo $Branchcode; ?>"></td>

		<td><input name="Orgin[]" size ="1" value="<?php echo $Orgin; ?>"></td>

		<td><input name="Special[]" size ="1" value="<?php echo $Special; ?>"></td>

		<td><input name="Scheduleday[]" size ="1" value="<?php echo $Scheduleday; ?>"></td>

		<td><input name="Iamount[]" size ="1" value="<?php echo $Iamount; ?>"></td>

		<td class="text-center">
			<button class="btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove()"><i class="fa fa-trash"></i></button>
		</td>
		</tr>
		<?php } } } ?>
	</table>
</div>




<script>
	$('.select2').select2({
		placeholder:"Select here",
		width:"100%"
	})
	$('.datetimepicker').datetimepicker({
		format:"y-m-d"
	})

	$('#add_list').click(function(){
		var TRECEPT = $('#TRECEPT').val(),
			Branchcode = $('#Branchcode').val(),
			Tdate = $('#Tdate').val();
			console
		var tr = $('#tr_clone tr').clone()
		tr.find('[name="TRECEPT[]"]').val(TRECEPT)
		tr.find('[name="Branchcode[]"]').val(Branchcode)
		tr.find('[name="Tdate[]"]').val(Tdate)
		tr.find('.TRECEPT').html($('#TRECEPT option[value="'+TRECEPT+'"]').html())
		tr.find('.Branchcode').html($('#Branchcode option[value="'+Branchcode+'"]').html())
		tr.find('.Tdate').html(Tdate)
		$('#attendance-list tbody').append(tr)
		$('#TRECEPT').val('').select2({
			placeholder:"Select here",
			width:"100%"
		})
		$('#Branchcode').val('')
		$('#Tdate').val('')

	})
	$(document).ready(function(){
		$('#employee-attendance').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				url:'ajax.php?action=save_employee_attendance',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Attendance data successfully saved","success");
							setTimeout(function(){
								location.reload()
							},1000)
						}
				}
			})
		})
	})
</script>







