<?php
$servername="localhost";
$username="root";
$password="";
$db="db_cakeshop";
$con = mysqli_connect($servername,$username,$password,$db);
if(!$con) {
	
	echo "Not connected";
	
	}
?>
