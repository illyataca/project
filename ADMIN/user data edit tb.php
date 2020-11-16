<?php
    require 'database.php';
 
    $norfid = null;
    if ( !empty($_GET['norfid'])) {
        $norfid = $_REQUEST['norfid'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$norfid = $_POST['norfid'];
		$gender = $_POST['gender'];
		$nokp = $_POST['nokp'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE pelajar  set name = ?, gender =?, nokp =?, email =?, mobile =?  WHERE norfid = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$gender,$nokp,$email,$mobile,$norfid));
		Database::disconnect();
		header("Location: user data.php");
    }
?>