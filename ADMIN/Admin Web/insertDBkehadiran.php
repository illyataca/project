<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
		$idpelajar = $_POST['idpelajar'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO kehadiran (idpelajar) values(?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($idpelajar));
		Database::disconnect();
		header("Location: attendance.php");
    }
?>