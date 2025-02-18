<?php
require_once "../src/db.php";

$data = json_decode(file_get_contents('php://input'), true);

foreach ($data as $user_id => $active_message) {
    $stmt = $conn->prepare("UPDATE users SET active_message_nb = ? WHERE id = ?");
    $stmt->bind_param("ii", $active_message, $user_id);
    $stmt->execute();
}

echo json_encode(['success' => true]);
?>
