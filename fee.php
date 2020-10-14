<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<script>
		// bukan bawa no rfid tapi bawa id pelajar
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				// $("#norfid").val($("#getUID").text);
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");	
				//	$("#norfid").val($("#getUID").text);
				}, 500);
			});
		</script>
		<style>
		body{
			background-image: url("bg8.jpg");
			background-position: center;
			background-size: cover;			
		}
		
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
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
		
		.table {
			margin: auto;
			width: 90%; 
			background-color: #DADADA;
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
		
		<title>User Data : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>
	
	<body>
		<h2>Kindergarten Management System</h2>
		<ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a href="user data.php">User Data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
			<li><a href="attendance.php">Attendance</a></li>
			<li><a href="register.php">Register Parents</a></li>
			<li><a class="active" href="fee.php">Fee</a></li>
		</ul>
		<br>
		<div class="container">
            <div class="row">
                <h3>Student's Fee</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#FF0D71" color="#000000">
                      <th>ID</th>
                      <th>Name</th>
					  <th>Gender</th>
					  <th>Month</th>
                      <th>Date</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
				   $pdo = Database::connect();
                   $sql = 'SELECT * FROM yuran 
							JOIN pelajar ON yuran.idpelajar = pelajar.idpelajar
							ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['norfid'] . '</td>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
							echo '<td>'. $row['bulan'] . '</td>';
							echo '<td>'. $row['tarikh'] . '</td>';
							echo '<td><a class="btn btn-success" href="user data edit page.php?id='.$row['norfid'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="user data delete page.php?id='.$row['norfid'].'">Delete</a>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
		</div> <!-- /container -->
	</body>
</html>