<?php
$id=$_GET['x'];
require_once '../src/db.php';
$sql="DELETE from bo_phan where ID ='$id'";
$ketqua=mysqli_query($conn, $sql) or die("Chuyển các nhân viên của bộ phận này sang phòng ban khác trước khi xóa!");
if($ketqua==true)
{
     header("Location:ql_bo_phan.php");
}
?>