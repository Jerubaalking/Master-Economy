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
							LID
						</th>

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
							LOAN
						</th>


						<th class="text-center">
							INTEREST
						</th>


						<th class="text-center">
							SCHEDULE AMOUNT
						</th>

						<th class="text-center">
							SCHEDULE DAY
						</th>

						<th class="text-center">
							GROUP
						</th>

						<th class="text-center">
            ACC NO.
						</th>

						<th class="text-center">
					 BRANCH CODE
						</th>

						<th class="text-center">
					 SPECIAL
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

$select = mysqli_query($conn, "SELECT * FROM borrowers") or die (mysqli_error($conn));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{
$id = $row['id'];
$fname = $row['fname'];
//$accte = $have['account'];
$Group = $row['Group'];
$email = $row['email'];
$phone = $row['phone'];
$addrs1 = $row['addrs1'];
$city = $row['city'];
$state = $row['state'];
$comment = $row['comment'];
$account = $row['account'];
$image = $row['image'];
$date_time = $row['date_time'];
$status = $row['status'];
$select1 = mysqli_query($conn, "SELECT * FROM systemset") or die (mysqli_error($conn));
while($row1 = mysqli_fetch_array($select1))
{
$Cramount1 = $Cramount - $Cramount;
$currency = $row1['currency'];
?>
    <td><input name="LoanID[]"  size ="1"></td>

		<td><input name="Tdate[]" type = "date" size ="1" value="<?php echo $Group; ?>"></td>

		<td><input name="TRECEPT[]"  size ="1"></td>

		<td><input name="Fullname[]"  size ="16" value="<?php echo $fname; ?>"></td>

		<td><input name="ScheduleAmount[]"  size ="6"></td>

		<td><input name="Iamount[]" size ="5"></td>

		<td><input name="Orgin[]" size ="6"></td>

		<td><input name="Scheduleday[]" size ="5"></td>

		<td><input name="GroupNo[]"  size ="1"  value="<?php echo $Group; ?>"></td>

		<td><input name="ACCNO[]"  size ="1" value="<?php echo $id; ?>"></td>

		<td><input name="Branchcode[]" size ="1"></td>

		<td><input name="Special[]" size ="1" value="loanx"></td>

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
				url:'ajax.php?action=save_loan',
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
