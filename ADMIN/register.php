<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nokp = $password = $confirm_password = "";
$nokp_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["nokp"]))){
        $nokp_err = "Please enter NRIC Parents.";
    } else{
        // Prepare a select statement
        $sql = "SELECT nokp FROM users WHERE nokp = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_nokp);
            
            // Set parameters
            $param_nokp = trim($_POST["nokp"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $nokp_err = "This username is already taken.";
                } else{
                    $nokp = trim($_POST["nokp"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($nokp_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (nokp, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_nokp, $param_password);
            
            // Set parameters
            $param_nokp = $nokp;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
				echo "
					<script>
						alert('Account have successfully created !');
						window.location.href='register.php';
					</script>";
				
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery.min.js"></script>
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
		
		<title>Register Parents</title>
	</head>
	
	<body>
	
	<center><a href="logout.php"  class="btn btn-danger">Sign Out of Your Account</a></center>
	
		<h2 align="center">Kindergarten Management System</h2>
		<ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a href="user data.php">User Data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
			<li><a href="attendance.php">Attendance</a></li>
			<li><a href="fullattendance.php">Attendance Record</a></li>
			<li><a class="active" href="register.php">Register Parents</a></li>
			<li><a href="fee.php">Fee</a></li>
		</ul>


	<div class="container">
		<br>
		<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #FF0D71;">

		<div class="row">
        <h3 align="center">Registration Form</h3>
		
        <p align="center">Please fill in this form to create an account.</p>
		<br>
		
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
            <div class="control-group
				<?php echo (!empty($nokp_err)) ? 'has-error' : ''; ?>">
					<label class="control-label">Username</label>
					<div class="controls">
					<input type="text" name="nokp" class="form-control" value="<?php echo $nokp; ?>">
					</div>
				<?php echo $nokp_err; ?>
            </div>    
			
            <div class="control-group
				<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<label class="control-label">Password</label>
					<div class="controls">
					<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
					</div>
				<?php echo $password_err; ?>
            </div>
			
            <div class="control-group
				<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<label class="control-label">Confirm Password</label>
					<div class="controls">
					<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
					</div>
				<?php echo $confirm_password_err; ?>
            </div>
			
			<br>
			
            <div align="center" class="control-group">
                <input type="submit" class="btn btn-success" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
			</form>
		</div>    
</body>
</html>