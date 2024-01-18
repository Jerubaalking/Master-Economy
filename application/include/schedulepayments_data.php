<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Employee's Payroll Management System</title>



</head>
<style>
	body{
        background: #80808045;
  }
  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
  div#confirm_modal {
      z-index: 9991;
  }
</style>

<body>

  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <main id="view-panel" >
      <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
  	<?php include $page.'.php' ?>


  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
</body>
<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal({
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal({
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
  $('.datetimepicker').datetimepicker({
      format:'Y/m/d H:i',
      startDate: '+3d'
  })
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
</script>
</html>












<?php include "../config/connect.php"; ?>
		<div class="container-fluid " >
			<div class="col-lg-12">

				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><b>Attendance List</b></span>
						<button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_attendance_btn"><span class="fa fa-plus"></span> Add Transaction</button>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<colgroup>
								<col width="10%">
								<col width="20%">
								<col width="30%">
								<col width="30%">
								<col width="10%">
							</colgroup>
							<thead>
								<tr>
									<th>Date</th>
									<th>Employee No</th>
									<th>Name</th>
									<th>Time Record</th>
                  <th>Time Record</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$att=$conn->query("SELECT GroupNo, a.*,e.id, concat(e.fname) as ename FROM trans a inner join borrowers e on a.id = e.id order by UNIX_TIMESTAMP(Tdate) asc  ") or die(mysqli_error());

                	while($row=$att->fetch_array()){
										$date = date("Y-m-d",strtotime($row['Tdate']));
                    $attendance[$row['id']."_".$date]['details'] = array("eid"=>$row['id'],"name"=>$row['ename'],"eno"=>$row['id'],"date"=>$date);
										if($row['GroupNo'] == 1 || $row['GroupNo'] == 3){
											if(!isset($trans[$row['id']."_".$date]['log'][$row['GroupNo']]))
											$attendance[$row['id']."_".$date]['log'][$row['GroupNo']] = array('id'=>$row['id'],"date" =>  $row['GroupNo']);
										}else{
											$attendance[$row['id']."_".$date]['Tdate'][$row['GroupNo']] =array('id'=>$row['id'],"date" =>  $row['Tdate']);
										}
										}
										foreach ($attendance as $key => $value) {
								?>
								<tr>
									<td><?php echo date("M d,Y",strtotime($attendance[$key]['details']['date'])) ?></td>
									<td><?php echo $attendance[$key]['details']['eno'] ?></td>
									<td><?php echo $attendance[$key]['details']['name'] ?></td>
                  <td><?php echo $attendance[$key]['details']['date'] ?></td>
                  <td><?php echo $attendance[$key]['details']['date'] ?></td>


									<td>
										<center>
										<button class="btn btn-sm btn-outline-danger remove_attendance" data-id="<?php echo $key ?>" type="button"><i class="fa fa-trash"></i></button>
										</center>
									</td>
								</tr>
								<?php
										}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<style>
			td p{
				margin: unset;
			}
			.rem_att{
				cursor: pointer;
			}
		</style>



	<script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){




			$('.edit_attendance').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Edit Employee","manage_attendance.php?id="+$id)

			});
			$('.view_attendance').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Employee Details","view_attendance.php?id="+$id,"mid-large")

			});
			$('#new_attendance_btn').click(function(){
				uni_modal("New Time Record/s","manage_attendance.php",'mid-large')
			})
			$('.remove_attendance').click(function(){
				var d = '"'+($(this).attr('data-id')).toString()+'"';
				_conf("Are you sure to delete this employee's time log record?","remove_attendance",[d])
			})
			$('.rem_att').click(function(){
				var $id=$(this).attr('data-id');
				_conf("Are you sure to delete this time log?","rem_att",[$id])
			})
		});
		function remove_attendance(id){
				// console.log(id)
				// return false;
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_employee_attendance',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Selected employee's time log data successfully deleted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
					}
			})
		}
		function rem_att(id){

			start_load()
			$.ajax({
				url:'ajax.php?action=delete_employee_attendance_single',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Selected employee's time log data successfully deleted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
					}
			})
		}
	</script>





























<?php include 'connect.php' ?>

<?php ?>

<div class="container-fluid">
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
						<option value="<?php echo $row['id'] ?>"><?php echo $row['ename']?></option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="col-md-3">
				<label for="" class="control-label">Type</label>
				<select id="Branchcode" class="borwser-default custom-select">
					<option value="1">Time-in AM</option>
					<option value="2">Time-out AM</option>
					<option value="3">Time-in PM</option>
					<option value="4">Tim-out PM</option>
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
							Employee
						</th>
						<th class="text-center">
							Type
						</th>
						<th class="text-center">
							Date
						</th>
						<th class="text-center">
							Date
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

$select = mysqli_query($conn, "SELECT * FROM trans WHERE ACCNO= '104' ORDER BY Tdate") or die (mysqli_error($conn));
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
$Cramount = $row['Cramount'];
$Dramount = $row['Dramount'];
$ScheduleAmount = $row['ScheduleAmount'];
$Tdate = $row['Tdate'];
$GroupNo = $row['GroupNo'];
$TRECEPT = $row['TRECEPT'];
$Branchcode = $row['Branchcode'];
$select1 = mysqli_query($conn, "SELECT * FROM systemset") or die (mysqli_error($conn));

while($row1 = mysqli_fetch_array($select1))
{
$Cramount1 = $Cramount - $Cramount;
$currency = $row1['currency'];
?>


	
			<td>
				<input name="TRECEPT[]" value="<?php echo $TRECEPT; ?>">
				<p class="attendance"></p>
			</td>

			<td>
				<input name="Branchcode[]"><?php echo $Branchcode; ?>
				<p class="type"></p>
			</td>
			
			<td>
				<input name="Tdate[]"><?php echo $Tdate; ?>
				<p class="adate"></p>
			</td>

						<td>
				<input name="Tdate[]"><?php echo $Tdate; ?></td>


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
		format:"y-m-d H:i "
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