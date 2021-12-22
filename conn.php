<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "unzahub";

	$connect = mysqli_connect($servername,$username,$password,$dbname);

	if (!$connect) {
		echo "Connection aborted";
	}
	
?>