<?php session_start(); ?>
<html>
<head>
	<title>OnlineAccounts</title>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href='https://fonts.googleapis.com/css?family=Almendra' rel='stylesheet'>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<center>
		<div id="header">
			Welcome to OnlineAccounts!
		</div>
		<?php
		if(isset($_SESSION['valid'])) {			
			include("connection.php");					
			// $result = mysqli_query($mysqli, "SELECT * FROM login");
		?>

			Welcome <?php echo "<b>".$_SESSION['name']."</b>" ?> ! <a href='logout.php'>Logout</a><br/>
			<br/>
			<a href='view.php'>View and Add Products</a>
			<br/><br/>
		<?php	
		} else {
			echo "<h3>You must ";
			// echo "<em><u><b>log-in</b></u></em>";
			// echo " or ";
			// echo "<em><u><b>register</b></u></em>";
			echo "<a href='login.php'>Login</a> or <a href='register.php'>Register</a>";
			echo " yourself to continue.<br/><br/></h3>";
		}
		?>
	</center>
</body>
</html>
