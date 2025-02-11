<?php
$id=$_GET['x'];
require_once '../src/db.php';
global $conn;
$sql="delete from nghi_viec where ID='$id'";
$results=mysqli_query($conn, $sql) or die("Câu truy vấn sai!");
if($results==true)
{
     header("Location:ql_nghi_viec.php");
}
?>