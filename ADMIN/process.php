<?php
require_once("database.php");
 
		$dbName = 'nodemcu_rc522_mysql' ;
		$dbHost = 'localhost' ;
		$dbUsername = 'root';
		$dbUserPassword = '';
		
		$connect = mysqli_connect($dbHost, $dbUsername, $dbUserPassword, $dbName);
		
		if(isset($_POST['login'])){
			$Uname = $_POST['Uname'];
			$password = $_POST['Pass'];
			
			$Uname    = strip_tags(mysqli_real_escape_string($connect,trim($Uname)));
			$password = strip_tags(mysqli_real_escape_string($connect,trim($password)));
			
			$query = "SELECT * FROM admin WHERE username='".$Uname."'";
			$tbl = mysqli_query($connect,$query);
			if(mysqli_num_rows($tbl)>0){
				
				$row = mysqli_fetch_array($tbl);
				$password_hash = $row['password'];
				if(password_verify($password,$password_hash))
				{
					
					header("Location: home.php");
					
				}
				else
				{
					$msg = 'Incorrect Password - Login Failed';
				}
			}
			else
			{
				$query = "SELECT * FROM users WHERE username='".$Uname."'";
				$tbl = mysqli_query($connect,$query);
				if(mysqli_num_rows($tbl)>0){
				
					$row = mysqli_fetch_array($tbl);
					$password_hash = $row['password'];
					if(password_verify($password,$password_hash))
					{
						header("Location: parentsinfo.php?idpelajar=".$row['idpelajar']);
					}
					else
					{
						$msg = 'Incorrect Password - Login Failed';
					}
				}
				else
				{
					$msg = 'Email is not valid';
				}
			}
		}