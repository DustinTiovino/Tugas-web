<?php 
include "connection.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "select * from akun where username='$username' and password='$password'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query); 
$result = mysqli_fetch_array($query);

if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
header('location:adminPage.php');
}

else{
	echo "login gagal";
}
?>