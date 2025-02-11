<?php
$servername = "mysql"; //Khai báo server
$username = "root"; // Khai báo username
$password = "haduyphuong"; // Khai báo password
$dbname = "cham_cong_1"; // Khai báo database
//Kết nối cơ sở dữ liệu 
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$conn) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
