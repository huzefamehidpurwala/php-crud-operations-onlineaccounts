<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href='https://fonts.googleapis.com/css?family=Almendra' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
</head>

<body>
<center>
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Refresh</a>";
	} else {
		$check = mysqli_query($mysqli, "SELECT username FROM login");
		while ($x = mysqli_fetch_array($check)) {
			if ($x['username'] == $user) {
				echo "Usename has been used previously. Please enter a unique Username.";
				echo "<br/>";
				echo "<a href='register.php'>Refresh</a>";
				exit;
			}
		}

		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
}
?>
	<div id="header"><font size="+2">Register</font></div>
	<form name="form1" method="post" action="">
		<table width="75%" border="0" style="float: right;">
			<tr> 
				<td width="10%">Full Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>
