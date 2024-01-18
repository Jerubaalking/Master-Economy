


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>




<body>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>



<script>
  jQuery('document').ready(function(){
    $table2=jQuery('#table_col_total');
      $table2.find('tbody').append('<tr><td>Total:</td></tr>');
      var length=$table2.find('thead tr th').length;
      for(var i=1;i<length;i++){
        var sum=0;
        $table2.find('tbody tr').each(function(){
          if(!isNaN(Number(jQuery(this).find('td').eq(i).text()))){
            sum=sum+Number(jQuery(this).find('td').eq(i).text());
          }
        });
        $table2.find('tbody tr:last-child').append('<td>'+sum+'</td>');
      }

  });
</script>







	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a href="https://sourcecodester.com" class="navbar-brand">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Filter Range Of Date With MySQLi</h3>
		<hr style="border-top:1px dotted #000;"/>
		

		<form class="form-inline" method="POST" action="">
			<label>Date:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1"/>
			<label>To</label>
			<input type="date" class="form-control" placeholder="End"  name="date2"/>
			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="index.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
		</form>


		<br /><br />



		<div class="table-responsive">	
			<table id="table_col_total" class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>REC.</th>
						<th>DATE</th>
						<th>FULL NAME</th>
						<th>GROUP</th>
						<th>TRANSACTION</th>
						<th>DEBIT</th>
						<th>CREDIT</th>
					</tr>
				</thead>
				<tbody>
					<?php include'range.php'?>	
				</tbody>
			</table>
		</div>	
	</div>
</body>
</html>
