<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
		$norfid = $_POST['norfid'];
        $name = $_POST['name'];
		$gender = $_POST['gender'];
		$nokp = $_POST['nokp'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO pelajar (norfid,name,gender,nokp,email,mobile) values(?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($norfid,$name,$gender,$nokp,$email,$mobile));
		Database::disconnect();
		header("Location: user data.php");
    }
?>