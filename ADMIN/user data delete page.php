<?php
    require 'database.php';
    $norfid = 0;
     
    if ( !empty($_GET['norfid'])) {
        $norfid = $_REQUEST['norfid'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $norfid = $_POST['norfid'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM pelajar  WHERE norfid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($norfid));
        Database::disconnect();
        header("Location: user data.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
	body {
			background-image: url("bg.jpg");
			background-position: center;
			background-size: cover;
		}
		
		textarea {
			resize: none;
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
		</style>
	
	<title>Delete : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
</head>
 
<body>
	<h2 align="center">Kindergarten Management System</h2>

    <div class="container">
     
		<div class="span10 offset1">
			<div class="row">
				<h3 align="center">Delete User</h3>
			</div>

			<form class="form-horizontal" action="user data delete page.php" method="post">
				<input type="hidden" name="norfid" value="<?php echo $norfid;?>"/>
				<p class="alert alert-error">Are you sure to delete ?</p>
				<div class="form-actions">
					<button type="submit" class="btn btn-danger">Yes</button>
					<a class="btn" href="user data.php">No</a>
				</div>
			</form>
		</div>
                 
    </div> <!-- /container -->
  </body>
</html>