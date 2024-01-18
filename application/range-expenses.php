<?php
	require'../config/connect.php';
	if(ISSET($_POST['search'])){
		$date1 = $_POST['date1'];
		$query=mysqli_query($conn, "SELECT * FROM `Trans` WHERE `Fullname` = 'EXPENSE'  ORDER BY Tdate") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>-1){
			while($fetch=mysqli_fetch_array($query)){
$tempCredit = $tempCredit + $fetch['Dramount'] + $fetch['Iamount'] - $fetch['Cramount'];
?>
	<tr>
		<td><?php echo $fetch['TRECEPT']?></td>
		<td><?php echo $fetch['Tdate']?></td>
		<td><?php echo $fetch['Fullname']?></td>
		<td><?php echo $fetch['Branchcode']?></td>
		<td><?php echo $fetch['Description']?></td>
		<td><?php echo $fetch['Dramount']?></td>
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
		$query=mysqli_query($conn, "SELECT * FROM `Trans` WHERE `Typecode` = 'EXPENSE' ORDER BY Tdate") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			$tempCredit = $tempCredit + $fetch['Dramount'] + $fetch['Iamount'] - $fetch['Cramount'];
?>
	<tr>
		<td><?php echo $fetch['TRECEPT']?></td>
		<td><?php echo $fetch['Tdate']?></td>
		<td><?php echo $fetch['Fullname']?></td>
		<td><?php echo $fetch['Branchcode']?></td>
		<td><?php echo $fetch['Description']?></td>
		<td><?php echo $fetch['Dramount']?></td>
	</tr>
<?php
		}
	}
?>
