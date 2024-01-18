<?php
	require'../config/connect.php';

	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM `Trans` WHERE `Tdate` BETWEEN '$date1' AND '$date2' order by tdate") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['TRECEPT']?></td>
		<td><?php echo $fetch['Tdate']?></td>
		<td><?php echo $fetch['Fullname']?></td>
		<td><?php echo $fetch['GroupNo']?></td>
		<td><?php echo $fetch['Branchcode']?></td>
		<td><?php echo $fetch['Dramount']?></td>
		<td><?php echo $fetch['Cramount']?></td>
<?php
			}
		}






		else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `Trans`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['TRECEPT']?></td>
		<td><?php echo $fetch['Tdate']?></td>
		<td><?php echo $fetch['Fullname']?></td>
		<td><?php echo $fetch['GroupNo']?></td>
		<td><?php echo $fetch['Branchcode']?></td>
		<td><?php echo $fetch['Dramount']?></td>
		<td><?php echo $fetch['Cramount']?></td>
	</tr>
<?php
		}



	}
?>

