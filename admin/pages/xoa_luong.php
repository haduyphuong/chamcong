<?php
$id=$_GET['x'];
require_once '../src/db.php';
global $conn;
$sql="delete from luong where He_so_luong='$id'";
$ketqua=mysqli_query($conn, $sql) or die("Câu truy vấn sai!");
if($ketqua==true)
{
     header("Location:ql_luong.php");
}
?>