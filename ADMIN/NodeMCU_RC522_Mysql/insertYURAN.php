<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
		$idpelajar = $_POST['idpelajar'];
        $bulan = $_POST['bulan'];
		$tarikh = $_POST['tarikh'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO yuran (idpelajar,bulan,tarikh,yuran) values(?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($idpelajar,$bulan,$tarikh,'1'));
		Database::disconnect();
		header("Location: fee.php");
    }
?>