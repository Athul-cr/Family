<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$num=$_POST['num'];
	$location=$_POST['location'];
		
	// update user data
	$sql = mysqli_query($conn, "UPDATE data SET name='$name',location='$location',num='$num' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index1.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$sql = mysqli_query($conn, "SELECT * FROM data WHERE id=$id");

while($user_data = mysqli_fetch_array($sql))
{
	$name = $user_data['name'];
	$location = $user_data['location'];
	$num = $user_data['num'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
	<a href="index1.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit1.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value=<?php echo $name;?>></td>
			</tr>
			<tr> 
				<td>location</td>
				<td><input type="text" name="location" value=<?php echo $location;?>></td>
			</tr>
			<tr> 
				<td>num</td>
				<td><input type="date" name="num" value=<?php echo $num;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>