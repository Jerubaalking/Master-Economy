<?php
	require'../config/connect.php';
	if(ISSET($_POST['search'])){
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];
		$query=mysqli_query($conn, "SELECT *, dramount + Iamount as totalloan FROM `Trans` WHERE `Fullname` = '$date1' AND `Branchcode` = '$date2'  ORDER BY Tdate") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>-1){
			while($fetch=mysqli_fetch_array($query)){


$tempCredit = $tempCredit + $fetch['Dramount'] + $fetch['Iamount'] - $fetch['Cramount'];
?>
	<tr>
		<td><?php echo $fetch['TRECEPT']?></td>
		<td><?php echo $fetch['Tdate']?></td>
		<td><?php echo $fetch['Fullname']?></td>
		<td><?php echo $fetch['GroupNo']?></td>
		<td><?php echo $fetch['Branchcode']?></td>
		<td><?php echo $fetch['totalloan']?></td>
		<td><?php echo $fetch['Cramount']?></td>
		<td><?php echo $tempCredit?></td>
<?php
			}
		}
		else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}
	else




	{
		$query=mysqli_query($conn, "SELECT *, dramount + Iamount as totalloan FROM `Trans` WHERE `Fullname` = '$date1' ORDER BY Tdate") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			$tempCredit = $tempCredit + $fetch['Dramount'] + $fetch['Iamount'] - $fetch['Cramount'];
?>
	<tr>
		<td><?php echo $fetch['TRECEPT']?></td>
		<td><?php echo $fetch['Tdate']?></td>
		<td><?php echo $fetch['Fullname']?></td>
		<td><?php echo $fetch['GroupNo']?></td>
		<td><?php echo $fetch['Branchcode']?></td>
		<td><?php echo $fetch['totalloan']?></td>
		<td><?php echo $fetch['Cramount']?></td>
		<td><?php echo $tempCredit?></td>
	</tr>
<?php
		}
	}
?>
