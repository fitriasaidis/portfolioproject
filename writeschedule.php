<?php
	session_start();
	include("headteacher.php");
    
?>
<html>  
	<head>
		<link rel="stylesheet" type="text/css" href="css/writeschedule.css"> 
	</head>
	
	<body class = "writesch">
		<section>
			<h3>ADD SCHEDULE</h3>
			<hr/>
			<form method="POST" action="addSchedule.php">
			<table>
				<tr> 
					<th>DATE</th>
					<td> <input type="date" name="date" size="30" required>	</td>
				</tr>

				<tr> 
					<th>START TIME</th>
					<td> <input type="time" name="start_time" size="6" required> </td>
				</tr>
				<tr> 
					<th>END TIME</th>
					<td> <input type="time" name="end_time" size="6" required> </td>
				</tr>
				
				<tr>	
					<th>STATUS</th>
					<td><input type = "text" name = "status" value="Available" readonly/> </td>	
				</tr>

				<tr> 
					<td colspan="2"> 
					<input type="submit" value="Done" name="submit"> 	
					<input type="reset" value="Reset" name="clear"></td>
				</tr>
				</table>
			</form>
		</section>
	</body>
</html>
<?php
include("footer.php");
?>