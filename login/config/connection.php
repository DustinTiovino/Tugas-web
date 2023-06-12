<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "sun_atk";
	$conn = mysqli_connect($server,$username,$password,$database);

	if(!$conn){
        die("gagal koneksi ke database");
    }

?>