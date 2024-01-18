<div class="box">
	       <div class="box-body">
			<div class="panel panel-success">
            <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> New Borrower</h3>
            </div>
             <div class="box-body">

			 <form class="form-horizontal" method="post" enctype="multipart/form-data">
			  <?php echo '<div class="alert alert-info fade in" >
			  <a href = "#" class = "close" data-dismiss= "alert"> &times;</a>
  				<strong>Note that&nbsp;</strong> &nbsp;&nbsp;Some Fields are Rquired.
				</div>'?>
             <div class="box-body">
<?php
if(isset($_POST['save']))
{
	$fname =  mysqli_real_escape_string($conn, $_POST['fname']);
	$Group = mysqli_real_escape_string($conn, $_POST['group']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$addrs1 = mysqli_real_escape_string($conn, $_POST['addrs1']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$martial = mysqli_real_escape_string($conn, $_POST['martial']);
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	$account = mysqli_real_escape_string($conn, $_POST['account']);
	$status = "Pending";





//$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//$image_name = addslashes($_FILES['image']['name']);
//$image_size = getimagesize($_FILES['image']['tmp_name']);

$target_dir = "../img/";
$target_file = $target_dir.basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["image"]["tmp_name"]);

if($check == false)
{
	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	echo '<br>';
	echo'<span class="itext" style="color: #FF0000">Invalid file type</span>';
}
//elseif(file_exists($target_file))
//{
	//echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	//echo '<br>';
	//echo'<span class="itext" style="color: #FF0000">Already exists.</span>';
//}
elseif($_FILES["image"]["size"] > 500000)
{
	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	echo '<br>';
	echo'<span class="itext" style="color: #FF0000">Image must not more than 500KB!</span>';
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
{
	echo '<meta http-equiv="refresh" content="2;url=view_emp.php?tid='.$id.'&&mid='.base64_encode("409").'">';
	echo '<br>';
	echo'<span class="itext" style="color: #FF0000">Sorry, only JPG, JPEG, PNG & GIF Files are allowed.</span>';
}
else{
	$sourcepath = $_FILES["image"]["tmp_name"];
	$targetpath = "../img/" . $_FILES["image"]["name"];
	move_uploaded_file($sourcepath,$targetpath);


	$location = "img/".$_FILES['image']['name'];

$insert = mysqli_query($conn, "INSERT INTO borrowers VALUES('','$fname','$Group','$email','$phone','$addrs1','$city','$state','$comment','$account','0.0',NOW(),'$status')") or die (mysqli_error($conn));
if(!$insert)
{
echo "<div class='alert alert-info'>Unable to Insert Borrower Records.....Please try again later</div>";
}
else{
echo "<div class='alert alert-success'>Borrower Information Created Successfully!</div>";
}
}
}
?>
			<div class="form-group">
            <label for="" class="col-sm-2 control-label">Your Image</label>
			<div class="col-sm-10">
  		  			 <input type='file' name="image" onChange="readURL(this);" /required>
       				 <img id="blah"  src="../avtar/user2.png" alt="Image Here" height="100" width="100"/>
			</div>
			</div>

			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Account Number</label>
                  <div class="col-sm-10">
<?php
$account = '013'.rand(1000000,10000000);
?>
                  <input name="account" type="text" class="form-control" value="<?php echo $account; ?>" placeholder="Account Number" readonly>
                  </div>
                  </div>

			<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Full Name</label>
                  <div class="col-sm-10">
                  <input name="fname" type="text" class="form-control" placeholder="Full Name" required>
                  </div>
                  </div>

		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Group Number</label>
                  <div class="col-sm-10">
                  <input name="group" type="text" class="form-control" placeholder="Group Number" required>
                  </div>
                  </div>

		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Email</label>
                  <div class="col-sm-10">
                  <input type="email" name="email" type="text" class="form-control" placeholder="Email">
                  </div>
                  </div>

		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">Mobile Number</label>
                  <div class="col-sm-10">
                  <input name="phone" type="text" class="form-control" placeholder="Mobile Number" required>
                  </div>
                  </div>


		 <div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Address 1</label>
                  	<div class="col-sm-10"><textarea name="addrs1"  class="form-control" rows="1" cols="80"></textarea></div>
          </div>


						<div class="form-group">
			                  <label for="" class="col-sm-2 control-label" style="color:#009900">Registration Date</label>
			                  <div class="col-sm-10">
			                  <input name="city" type="date" class="form-control" placeholder="Registration Date"required >
			                  </div>
			                  </div>


						<div class="form-group">
									      <label for="" class="col-sm-2 control-label" style="color:#009900">Birth Date</label>
									      <div class="col-sm-10">
									      <input name="city" type="date" class="form-control" placeholder="Birth Date"required >
									      </div>
									      </div>



		<div class="form-group">
                  <label for="" class="col-sm-2 control-label" style="color:#009900">State</label>
                  <div class="col-sm-10">
                  <input name="state" type="text" class="form-control" placeholder="State" required>
                  </div>
                  </div>


									<div class="form-group">
							                  <label for="" class="col-sm-2 control-label" style="color:#009900">Gender</label>
							                  <div class="col-sm-10">
											<select name="gender"  class="form-control" required>
																	<option value="TJ">Male</option>
																	<option selected='selected'>Female</option>
																</select>
																 </div>
							                 					 </div>



												<div class="form-group">
											 						<label for="" class="col-sm-2 control-label" style="color:#009900">Martial Status</label>
											 						<div class="col-sm-10">
											 						<select name="martial"  class="form-control" required>
											 							<option selected='selected'>Married</option>
											 							<option>Single</option>
																		<option>Devorced</option>
																		<option>Widow/Widower</option>
											 						</select>
											 							 </div>
											 							        </div>


				<div class="form-group">
                  	<label for="" class="col-sm-2 control-label" style="color:#009900">Comment</label>
                  	<div class="col-sm-10"><textarea name="comment"  class="form-control" rows="4" cols="80"></textarea></div>
          	</div>

			 </div>

			  <div align="right">
              <div class="box-footer">
                				<button type="reset" class="btn btn-primary btn-flat"><i class="fa fa-times">&nbsp;Reset</i></button>
                				<button name="save" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save">&nbsp;Save</i></button>

              </div>
			  </div>

			 </form>


</div>
</div>
</div>
</div>
