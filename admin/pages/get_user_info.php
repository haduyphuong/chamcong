<?php
require_once "../src/db.php";

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);
    
    // Truy vấn thông tin người dùng và thông tin nhân viên dựa trên email
    $result = $conn->query("
        SELECT u.*,  bp.Ten 
        FROM users u
        JOIN bo_phan bp ON bp.ID = u.ID_bophan
        WHERE u.id = $user_id");
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo "<p><strong>Tên người gửi:</strong> " . htmlspecialchars($user['username']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($user['username']) . "</p>";
        echo "<p><strong>Chức danh:</strong> " . htmlspecialchars($user['chucdanh']) . "</p>";
        echo "<p><strong>Giới tính:</strong> " . htmlspecialchars($user['Gioitinh']) . "</p>";
        echo "<p><strong>Ngày sinh:</strong> " . htmlspecialchars($user['Ngaysinh']) . "</p>";
        echo "<p><strong>Phòng ban:</strong> " . htmlspecialchars($user['Ten']) . "</p>";
        // Hiển thị thêm các thông tin khác của nhân viên từ bảng users
    } else {
        echo "<p>Không tìm thấy nhân viên với email này.</p>";
    }
} else {
    echo "<p>Không có thông tin người dùng.</p>";
}
?>
