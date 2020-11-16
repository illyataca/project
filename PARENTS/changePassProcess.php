<?php
session_start();
require_once("config.php");
$currentPassword 	= $_POST['currentPassword'];
$newPassword		= $_POST['newPassword'];
$confirmPassword	= $_POST['confirmPassword'];
$query = "SELECT * FROM users where nokp = " . $_SESSION['nokp'];
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$pass = $row['password'];
if (password_verify($currentPassword, $pass)){
	if ($newPassword == $confirmPassword){
		$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
		$query = "UPDATE users SET password = '$newPassword' WHERE nokp=" . $_SESSION['nokp'];
		$result = mysqli_query($link, $query);
		if ($result) {
			echo "
					<script>
						alert('Password have successfully changed');
						window.location.href='changePass.php';
					</script>";
		}
	}else{
		echo "
					<script>
						alert('NEW PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH');
						window.location.href='changePass.php';
					</script>";
	}
}else{
	echo "
					<script>
						alert('CURRENT PASSWORD IS WRONG');
						window.location.href='changePass.php';
					</script>";
}
