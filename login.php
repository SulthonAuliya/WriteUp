<?php 

include 'connection/connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "select * from account where username='$username' and password='$password'";

$login = mysqli_query($db_connection, $query);
$cek = mysqli_num_rows($login);

if ($cek > 0){
    session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("index.php");
}
else{
    header("location:index.php");	
}

?>