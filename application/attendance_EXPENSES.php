<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Expenses</title>
<?php
	session_start();
  if(!isset($_SESSION['login_id']))

 include('./header.php');
 // include('./auth.php');
 ?>

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
        <button type="button" class="btn btn-primary" id='submit1' onclick="$('#uni_modal form').submit()">Save</button>
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
						<span><b>Expenses List</b></span>
						<button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_attendance_btn"><span class="fa fa-plus"></span> Expenses</button>
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
      <?php include'range-expenses.php'?>
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
				uni_modal("Edit Employee","manage_attendance_REGLOAN.php?id="+$id)

			});
			$('.view_attendance').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Employee Details","view_attendance.php?id="+$id,"mid-large")

			});


			$('#new_attendance_btn').click(function(){
				uni_modal("New Time Record/s","manage_attendance - DEBIT.php",'large')
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
