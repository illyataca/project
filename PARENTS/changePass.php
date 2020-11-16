<?php
session_start();
    require 'database.php';
    $nokp = null;
    if ( !empty($_GET['nokp'])) {
        $nokp = $_REQUEST['nokp'];
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM pelajar where nokp = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($nokp));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
?>



<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		
		<style>
		body{
			background-image: url("bg.jpg");
			background-position: center;
			background-size: cover;			
		}
		
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
		}
		
		textarea {
			resize: none;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		</style>
		
		<title>Change Password : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
		
	</head>
	
	<body>
	
	<center><a href="logout.php"  class="btn btn-danger">Sign Out of Your Account</a></center>

		<center><h2>Kindergarten Management System</h2></center>
		<ul class="topnav">
			<li><a href="parentsinfo.php?nokp=<?php echo $_SESSION['nokp']?>">Student's Info</a></li>
			<li><a class="active" href="changePass.php">Change Password</a></li>
		</ul>
		<br>
		
		<div class="container">
     
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #FF0D71;">
				<div class="row">
					<h3 align="center">Change Password</h3>
					<p id="defaultGender" hidden><?php echo $data['gender'];?></p>
				</div>
		 <?php $id2 = $_SESSION['nokp']?>
				<div><?php if(isset($message)) { echo $message; } ?></div>
				<form method="post" action="changePassProcess.php" align="center">
				Current Password:<br>
				<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
				<br>
				New Password:<br>
				<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
				<br>
				Confirm Password:<br>
				<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
				<br><br>
				<input class="btn btn-success" type="Submit">
				</form>
				<br>=
				<br>
				</body>
				</html>
		</div> <!-- /container -->	
		<script>
			var g = document.getElementById("defaultGender").innerHTML;
			if(g=="Male") {
				document.getElementById("mySelect").selectedIndex = "0";
			} else {
				document.getElementById("mySelect").selectedIndex = "1";
			}
		</script>
	</body>
</html>