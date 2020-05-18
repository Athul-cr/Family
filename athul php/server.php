<?php
$nme = "";
$pass = "";
$errors = array();
// Create connection
$conn = mysqli_connect('localhost','root','','ath');

if(!$conn)
{
    die('Could not connect to database: ' . mysql_error());
}

$db_select = mysqli_select_db($conn, 'ath');
if(!$db_select)
{
    die('Can\'t use ' . 'ath' . ': ' . mysql_error());
}

// Check connection
if(isset($_POST['register']))
{
	$fst=mysqli_real_escape_string($conn,$_POST["first"]);
	$lst=mysqli_real_escape_string($conn,$_POST["last"]);
	$nme=mysqli_real_escape_string($conn,$_POST["user"]);
	$pass=mysqli_real_escape_string($conn,$_POST['pass']);
$addr=mysqli_real_escape_string($conn,$_POST["address"]);
	$cty=mysqli_real_escape_string($conn,$_POST["city"]);
	$sta=mysqli_real_escape_string($conn,$_POST["state"]);
	$zp=mysqli_real_escape_string($conn,$_POST['zip']);
	if(empty($fst))
	{
		array_push($errors, "username is requrired");
	}
	if(empty($lst))
	{
		array_push($errors, "last is requrired");
	}
	if(empty($nme))
	{
		array_push($errors, "email is requrired");
	}
	if(empty($pass))
	{
		array_push($errors, "pass is requrired");
	}
	if(empty($addr))
	{
		array_push($errors, "address is requrired");
	}
	if(empty($cty))
	{
		array_push($errors, "city is requrired");
	}
	if(empty($sta))
	{
		array_push($errors, "state is requrired");
	}
	if(empty($zp))
	{
		array_push($errors, "zipcode is requrired");
	}
	if(count($errors) == 0) {
		$pass = ($pass); //encrpt pass before storing
		$sql ="INSERT INTO reg (FirstName, LastName, Email, pass, Address, City, State, Zip) VALUES ('$fst', '$lst', '$nme', '$pass', '$addr', '$cty', '$sta', '$zp')";
		mysqli_query($conn, $sql);
		$_SESSION["first"] = (string) $fst;
		$_SESSION["success"] = " YOU are now logged in ";
		header('location: home.php');
	}
}

if (isset($_POST['login'])) {
  $nme = mysqli_real_escape_string($conn, $_POST["user"]);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);

  if (empty($nme)) {
  	array_push($errors, "Username is required");
  }
  if (empty($pass)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$pass = ($pass);
  	$sql = "SELECT * FROM reg WHERE Email='$nme' AND pass='$pass'";
  	$results = mysqli_query($conn, $sql);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['user'] = (string) $nme;
  	  $_SESSION["success"] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>