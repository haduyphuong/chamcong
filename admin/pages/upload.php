<?php
session_start();
require_once "../src/db.php";
require '../../vendor/autoload.php'; // Tải PhpSpreadsheet
global $conn;
use PhpOffice\PhpSpreadsheet\IOFactory;

$ma_nv = $_SESSION['Ma_nv'];
$year = $_POST['year'];
$month = $_POST['month'];

if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Đường dẫn tạm của file
    $filePath = $_FILES['file']['tmp_name'];

    try {
        // Load file Excel
        $spreadsheet = IOFactory::load($filePath);

        // Lấy dữ liệu từ sheet đầu tiên
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        $stmt = $conn->prepare("INSERT INTO phan_ca_lam (Ma_nv, id_ca_lam, ngay) VALUES (?, ?, ?)");

        foreach ($rows as $row) {
            // Giả sử dữ liệu trong file Excel có cấu trúc: Ma_nv, id_ca_lam, ngay
            $ma_nv = $row[0];
            $id_ca_lam = $row[1];
            $ngay = $row[2];

            // Thực hiện chèn dữ liệu vào cơ sở dữ liệu
            $stmt->bind_param("iis", $ma_nv, $id_ca_lam, $ngay);
            $stmt->execute();
        }

        echo "Dữ liệu đã được tải lên thành công.";

    } catch (Exception $e) {
        echo "Lỗi khi đọc file Excel: " . $e->getMessage();
    }
} else {
    echo "Vui lòng upload file hợp lệ.";
}
?>