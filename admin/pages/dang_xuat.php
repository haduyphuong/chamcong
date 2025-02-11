<?php 
	session_start();
	require_once '../src/db.php';
	global $conn;
	if(isset($_SESSION['Ma_nv'])){
		$user = $_SESSION['Ma_nv'];
		$sql = "UPDATE users SET login = 0 WHERE Ma_nv= '$user'";
		$result = mysqli_query($conn, $sql);
	}
	session_destroy();
	echo "<script> alert('Bạn đã đăng xuất khỏi hệ thống');</script>";
	echo "<script> window.location = 'index.php';</script>";
 ?>