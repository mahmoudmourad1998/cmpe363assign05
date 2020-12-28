

<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<div align="center">
		<h1> Mahmoud Ayman Mourad</h1>
		<h2> 116200018 </h2>
	</div>
	<div  align="center">
		<h1> Mohamed Ibrahim </h1>
		<h2> 119202085 </h2>
	</div>
	<div  align="center">
		<h1> Abdallah Soda </h1>
		<h2> 117207070 </h2>
	</div>
	<body>
		<div class="data_table">
			<?php
				$connectionInfo = array("UID" => "mahmourad98", "pwd" => "25JaNuArY2011", "Database" => "cmpe363db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
				$serverName = "tcp:cmpe363sqlsrvr.database.windows.net,1433";
				$conn = sqlsrv_connect($serverName, $connectionInfo);
				$query = "SELECT TOP (1000) CustomerID, FirstName, CompanyName FROM [SalesLT].[Customer]";
				if ($conn) {
					$query_result = sqlsrv_query($conn, $query);
				}
			?>
			<table align="center" border="1px" style="width:600px; line-height:40px;"> 
			<?php
				if ($query_result != FALSE) {
			?>
			<tr> 
				<th> Customer ID </th> 
				<th> First Name </th> 
				<th> Company </th> 
			</tr> 
			<?php
				}
			?>
			<?php 
				while($rows = sqlsrv_fetch_array($query_result, SQLSRV_FETCH_ASSOC)) { 
			?> 
			<tr> 
				<td> <?php echo $rows['CustomerID']; ?> </td> 
				<td> <?php echo $rows['FirstName']; ?> </td> 
				<td> <?php echo $rows['CompanyName']; ?> </td> 
			</tr> 
			<?php 
				}
			?>
		</table> 
		</div>
	</body> 
</html>