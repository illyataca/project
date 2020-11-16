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
		<script type="text/javascript">
        $(document).ready(function() {
            $(".fee1").click(function() {
                var country_id = document.getElementById("country").value;
                $.ajax({
                    url: "state_city.php",
                    method: "post",
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        $(".state").html(data);
                    }
                });
            });

            $(".fee0").click(function() {
                var s_country_id = $(".country").val();
                var state_id = $(this).val();
                $.ajax({
                    url: "state_city.php",
                    method: "POST",
                    data: {
                        s_country_id: s_country_id,
                        state_id: state_id
                    },
                    success: function(data) {
                        $(".city").html(data);
                    }
                });
            });
        });
    </script>
	
		<title>User Data : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>
	
	<body>
	
	<a href="logout.php"  class="btn btn-danger">Sign Out of Your Account</a>
	
		<h2>Kindergarten Management System</h2>
		<ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a href="user data.php">User Data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
			<li><a href="attendance.php">Attendance</a></li>
			<li><a href="fullattendance.php">Attendance Record</a></li>
			<li><a href="register.php">Register Parents</a></li>
			<li><a class="active" href="fee.php">Fee</a></li>
		</ul>
		
		
		<br>
		<br>
		
		<center><table style="width:70%;" class="table table-striped table-bordered"></center>
		<thead>
                    <tr bgcolor="#FF0D71" color="#000000">
						<th style="width:20%;">Student's Name</th>
						<th style="width:3%;">1</th>
						<th style="width:3%;">2</th>
						<th style="width:3%;">3</th>
						<th style="width:3%;">4</th>
						<th style="width:3%;">5</th>
						<th style="width:3%;">6</th>
						<th style="width:3%;">7</th>
						<th style="width:3%;">8</th>
						<th style="width:3%;">9</th>
						<th style="width:3%;">10</th>
						<th style="width:3%;">11</th>
						<th style="width:3%;">12</th>
					  </tr>
					  </thead>
					  
<?php
                   include 'database.php';
				   $pdo = Database::connect();
                   $sql = 'SELECT * FROM pelajar LEFT JOIN yuran ON pelajar.nokp = yuran.idpelajar; ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
?>
					  <tr>
						<td><?php echo  $row['name'] ?></td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 1";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 2";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 3";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 4";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 5";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 6";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 7";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 8";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 9";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 10";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 11";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						<td>
							<?php
								$sql = "SELECT * FROM yuran WHERE idpelajar = '{$row['nokp']}' AND bulan = 12";
								$rsyuran = $conn->query($sql);
								if ($rsyuran->num_rows > 0) {
									echo '/';
								} else {
									echo 'X';
								}
							?>
						</td>
						
					</tr>
			<?php	
				   }
?> 
				
			</table>
				<br>
				<form class="form-horizontal" action="insertfee.php" method="post">
								<tr>
									<center>
									<td> <button type="submit" class="btn btn-success">Add New Payment</button>
									</td>
									</center>
								</tr>
						</form>		
				<p id="demo"></p>

		<script>
		var a = document.getElementById("date").value;
		
		</script>
		
	</body>
</html>
</html>