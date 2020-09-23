<?php
    require 'database.php';
 
    $norfid = null;
    if ( !empty($_GET['norfid'])) {
        $id = $_REQUEST['norfid'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['norfid'];
		$gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		$mobile = $_POST['fee'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE pelajar  set name = ?, gender =?, email =?, mobile =? , fee =? WHERE norfid = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$gender,$email,$mobile,$fee,$norfid));
		Database::disconnect();
		header("Location: user data.php");
    }
?>