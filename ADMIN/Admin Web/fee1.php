<?php
 require_once("database.php");
 
		$dbName = 'nodemcu_rc522_mysql' ;
		$dbHost = 'localhost' ;
		$dbUsername = 'root';
		$dbUserPassword = '';
		
$conn = mysqli_connect($dbHost, $dbUsername, $dbUserPassword, $dbName);
    $query="UPDATE yuran SET yuran = '1' WHERE idyuran=".$_GET ['id'];
    $result=mysqli_query($conn,$query);
    if($result){
            header("location: fee.php");
    }
?>