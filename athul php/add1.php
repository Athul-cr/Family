<html>
<head>
	<title>Add Users</title>
</head>

<body>
	<a href="index1.php">Go to Home</a>
	<br/><br/>

	<form action="add1.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>location</td>
				<td><input type="text" name="location"></td>
			</tr>
			<tr> 
				<td>num</td>
				<td><input type="date" name="num"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$location = $_POST['location'];
		$num = $_POST['num'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$sql = mysqli_query($conn, "INSERT INTO data(name,location,num) VALUES('$name','$location','$num')");
		
		// Show message when user added
		echo "User added successfully. <a href='index1.php'>View Users</a>";
	}
	?>
</body>
</html>