$select = mysqli_query($conn, "SELECT * FROM trans WHERE ACCNO='157' and Branchcode='Loan' ORDER BY Tdate") or die (mysqli_error($conn));




$select = mysqli_query($conn, "SELECT * FROM trans WHERE Tdate = '2022-08-02' ORDER BY Tdate") or die (mysqli_error($conn));