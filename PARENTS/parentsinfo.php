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
		<style>
		body {
			background-image: url("bg.jpg");
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
	
	<a href="logout.php"  class="btn btn-danger">Sign Out of Your Account</a>
	
		<h2>Kindergarten Management System</h2>
		<ul class="topnav">
			<li><a class="active" href="parentsinfo.php?nokp=<?php echo $nokp?>">Student's Info</a></li>
			<li><a href="changePass.php">Change Password</a></li>
		</ul>
		<br>
		<div class="container">
            <div class="row">
                <h3>My Child's Info</h3>
            </div>
			
			<p id="getUID" ></p>
			
			
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#FF0D71" color="#000000">
                      <th>Name</th>
                      <th>ID</th>
					  <th>Gender</th>
					  <th>NRIC Parents</th>
					  <th>Email</th>
                      <th>Mobile Number</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  include 'database.php';
				  $id = $_GET['nokp'];
                   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM pelajar WHERE pelajar.nokp='.$id;
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['norfid'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
                            echo '<td>'. $row['nokp'] . '</td>';
							echo '<td>'. $row['email'] . '</td>';
							echo '<td>'. $row['mobile'] . '</td>';
							echo '<td><a class="btn btn-success" href="parents data edit page.php?nokp='.$row['nokp'].'">Edit</a>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
			
		
                <h3>Fee's Info</h3>

			
			<div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#FF0D71" color="#000000">
					  <th>Date</th>
					  <th>Month</th>
					  <th>School's Fee</th> 
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  $id = $_GET['nokp'];
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM pelajar JOIN yuran ON pelajar.nokp=yuran.idpelajar WHERE pelajar.nokp='.$id;
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['tarikh'] . '</td>';
							echo '<td>'. $row['bulan'] . '</td>';
							echo '<td>Done</td>';
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