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
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		$id2 = $_GET['idpelajar'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE pelajar  set name = ?, gender =?, email =?, mobile =?  WHERE norfid = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$gender,$email,$mobile,$norfid));
		Database::disconnect();
		header("Location: parentsinfo.php?idpelajar=".$id2);
    }
?>