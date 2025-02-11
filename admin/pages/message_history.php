<?php require 'header.php'; ?>
<?php require_once "../src/db.php"; 
$bo_phan = $conn->query("SELECT * FROM bo_phan"); 
$user_id = $_SESSION['id'];

// Sample query to get chat messages, adjust as necessary
// $messages = $conn->query("SELECT m.*, u.username FROM messages m JOIN users u ON m.user_id = u.id  ORDER BY m.created_at DESC"); 

$messages = $conn->query("
    SELECT m.*, 
           u.username AS sender_name, 
           u2.username AS assigned_name
    FROM messages m 
    JOIN users u ON m.user_id = u.id 
    LEFT JOIN users u2 ON m.assigned_to = u2.id
    WHERE m.user_id = $user_id
    ORDER BY m.created_at DESC
"); 

$search = isset($_GET['search']) ? $_GET['search'] : '';

$messages_admin = $conn->query("
    SELECT m.*, 
           u.username AS sender_name, 
           u2.username AS assigned_name
    FROM messages m 
    JOIN users u ON m.user_id = u.id 
    LEFT JOIN users u2 ON m.assigned_to = u2.id
    WHERE (m.message LIKE '%$search%')
    ORDER BY m.created_at DESC
");

$messages_tp = $conn->query("
    SELECT m.*, 
           u.username AS sender_name, 
           u2.username AS assigned_name
    FROM messages m 
    JOIN users u ON m.user_id = u.id 
    LEFT JOIN users u2 ON m.assigned_to = u2.id
    WHERE m.assigned_to = $user_id
    ORDER BY m.created_at DESC
");

if ($search) {
    $messages_tp .= " AND m.message LIKE '%$search%'";
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lịch sử chat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Lịch sử chat</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- <?php var_dump($rowUserNow['username'])?> -->


    <?php if ($_SESSION['role'] == '0' || $rowUserNow['approve_message'] == '1') { ?>

        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <form method="GET" action="">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tin nhắn..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </div>
</form>
                            <!-- Chat messages here -->
                            <?php if ($messages_admin->num_rows > 0): ?>
                                <ul class="chat-messages">
                                    <?php while ($row = $messages_admin->fetch_assoc()): ?>
                                        <?php if($row['active'] == 1) { ?>
                                                                                       
                                        <li style="background-color: #3794ff;" class="chat-message d-flex justify-content-between align-items-center">
                                            <div class="media"  onclick="location.href='chat.php?message=<?php echo $row['id']; ?>'">
                                                <img src="/admin/Public/icon_chat.jpg" alt="<?php echo $row['sender_name']; ?>" class="avatar mr-3" />
                                                <div class="media-body">
                                                    <h5 class="mt-0"><?php echo htmlspecialchars($row['sender_name']); ?>, Admin,
                                                
                                                    <?php if($row['assigned_name']){ ?>
                                                        <?php echo htmlspecialchars($row['assigned_name']); ?>
                                                        <?php } else{ ?>
                                                            <span class="text-warning">Chờ chỉ định hỗ trợ</span>
                                                            <?php } ?>
                                                </h5>
                                                    <p><?php echo htmlspecialchars($row['message']); ?></p>                                                   
                                                </div>
                                            </div>

                                            <!-- Dropdown select for users and delete button -->

                                            <div class="d-flex align-items-center justify-content-around">
                                         

                                        <?php if(!$row['assigned_name']){ ?>

                                            <select class="form-control form-control-sm mr-2" id="userSelect-<?php echo $row['id']; ?>"  onchange="updateAssignedTo(<?php echo $row['id']; ?>, this.value, '<?php echo htmlspecialchars($row['message']); ?>', '<?php echo $row['user_id']; ?>')">
                                                <option value="">Chọn người hỗ trợ</option>
                                                <?php
                                                // Lấy danh sách user có role = 1
                                                $users = $conn->query("SELECT id, username FROM users WHERE role = 1");
                                                while ($user = $users->fetch_assoc()):
                                                ?>
                                                    <option value="<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['username']); ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <?php } ?>
                                            <button class="btn btn-success btn-sm mr-2" onclick="showSenderInfo(<?php echo $row['user_id']; ?>)"> <i class="fas fa-eye"></i></button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteMessage(<?php echo $row['id']; ?>)"> <i class="fas fa-trash"></i></button>
                                        </div>
                                      
                                        </li>

                                        <?php } else { ?>
                                            <li style="background-color: #f05454;" class="chat-message d-flex justify-content-between align-items-center">
                                            <div class="media"  onclick="location.href='chat.php?message=<?php echo $row['id']; ?>'">
                                                <img src="/admin/Public/icon_chat.jpg" alt="<?php echo $row['sender_name']; ?>" class="avatar mr-3" />
                                                <div class="media-body">
                                                    <h5 class="mt-0"><?php echo htmlspecialchars($row['sender_name']); ?>, Admin,
                                                
                                                    <?php if($row['assigned_name']){ ?>
                                                        <?php echo htmlspecialchars($row['assigned_name']); ?>
                                                        <?php } else{ ?>
                                                            <span class="text-warning">Chờ chỉ định hỗ trợ</span>
                                                            <?php } ?>
                                                </h5>
                                                    <p><?php echo htmlspecialchars($row['message']); ?></p>                                                   
                                                </div>
                                            </div>

                                            <!-- Dropdown select for users and delete button -->

                                            <div class="d-flex align-items-center justify-content-around">
                                         

                                        <?php if(!$row['assigned_name']){ ?>

                                            <select class="form-control form-control-sm mr-2" id="userSelect-<?php echo $row['id']; ?>"  onchange="updateAssignedTo(<?php echo $row['id']; ?>, this.value, '<?php echo htmlspecialchars($row['message']); ?>', '<?php echo $row['user_id']; ?>')">
                                                <option value="">Chọn người hỗ trợ</option>
                                                <?php
                                                // Lấy danh sách user có role = 1
                                                $users = $conn->query("SELECT id, username FROM users WHERE role = 1");
                                                while ($user = $users->fetch_assoc()):
                                                ?>
                                                    <option value="<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['username']); ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <?php } ?>
                                            <button class="btn btn-success btn-sm mr-2" onclick="showSenderInfo(<?php echo $row['user_id']; ?>)"> <i class="fas fa-eye"></i></button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteMessage(<?php echo $row['id']; ?>)"> <i class="fas fa-trash"></i></button>
                                        </div>
                                      
                                        </li>

                                        <?php } ?>
                                    <?php endwhile; ?>
                                </ul>
                            <?php else: ?>
                                <p>Chưa có tin nhắn nào.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <?php } elseif($_SESSION['role'] == '1') { ?>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <form method="GET" action="">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tin nhắn..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </div>
</form>
                            <!-- Chat messages here -->
                            <?php if ($messages_tp->num_rows > 0): ?>
                                <ul class="chat-messages">
                                    <?php while ($row = $messages_tp->fetch_assoc()): ?>
                                        <li class="chat-message d-flex justify-content-between align-items-center">
                                            <div class="media"  onclick="location.href='chat.php?message=<?php echo $row['id']; ?>'">
                                                <img src="/admin/Public/icon_chat.jpg" alt="<?php echo $row['sender_name']; ?>" class="avatar mr-3" />
                                                <div class="media-body">
                                                    <h5 class="mt-0"><?php echo htmlspecialchars($row['sender_name']); ?>, Admin,
                                                
                                                    <?php if($row['assigned_name']){ ?>
                                                        <?php echo htmlspecialchars($row['assigned_name']); ?>
                                                        <?php } else{ ?>
                                                            <span class="text-warning">Chờ chỉ định hỗ trợ</span>
                                                            <?php } ?>
                                                </h5>
                                                    <p><?php echo htmlspecialchars($row['message']); ?></p>                                                   
                                                </div>
                                            </div>

                                            <!-- Dropdown select for users and delete button -->

                                            <div class="d-flex align-items-center">
                                        <?php if(!$row['assigned_name']){ ?>

                                            <select class="form-control form-control-sm mr-2" id="userSelect-<?php echo $row['id']; ?>"  onchange="updateAssignedTo(<?php echo $row['id']; ?>, this.value, '<?php echo htmlspecialchars($row['message']); ?>', '<?php echo $row['user_id']; ?>')">
                                                <option value="">Chọn người hỗ trợ</option>
                                                <?php
                                                // Lấy danh sách user có role = 1
                                                $users = $conn->query("SELECT id, username FROM users WHERE role = 1");
                                                while ($user = $users->fetch_assoc()):
                                                ?>
                                                    <option value="<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['username']); ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <?php } ?>

                                            <!-- <button class="btn btn-danger btn-sm" onclick="deleteMessage(<?php echo $row['id']; ?>)">Xóa</button> -->
                                        </div>
                                      
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php else: ?>
                                <p>Chưa có tin nhắn nào.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <?php } else { ?>

        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body card-body-chat">
                            <!-- Chat messages here -->
                            <?php if ($messages->num_rows > 0): ?>
                                <ul class="chat-messages">
                                    <?php while ($row = $messages->fetch_assoc()): ?>
                                        <?php if($row['active'] == 1) { ?>                                        
                                        <li class="chat-message" onclick="location.href='chat.php?message=<?php echo $row['id']; ?>'">
                                            <div class="media">
                                                <img src="/admin/Public/icon_chat.jpg" alt="<?php echo $row['sender_name']; ?>" class="avatar mr-3" />
                                                <div class="media-body">
                                                    <h5 class="mt-0"><?php echo htmlspecialchars($row['sender_name']); ?>, Admin,
                                                
                                                    <?php if($row['assigned_name']){ ?>
                                                        <?php echo htmlspecialchars($row['assigned_name']); ?>
                                                        <?php } else{ ?>
                                                            <span class="text-warning">Chờ chỉ định hỗ trợ</span>
                                                            <?php } ?>
                                                </h5>
                                                    <p><?php echo htmlspecialchars($row['message']); ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                </ul>
                            <?php else: ?>
                                <p>Chưa có tin nhắn nào.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <?php } ?>


<style>
     .card-body-chat {
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: 500px; /* Đặt chiều cao cho card-body */
    }

    .chat-messages {
        list-style-type: none;
        padding: 0;
        max-height: 500px; /* Chiều cao cố định cho khung tin nhắn */
        overflow-y: auto; /* Cuộn khi đầy */
        margin-bottom: 20px; /* Khoảng cách dưới cùng */
        flex-grow: 1; /* Để chiếm không gian còn lại */
    }
</style>

    <!-- /.content -->
</div>

<!-- Modal để hiển thị thông tin người gửi -->
<div class="modal fade" id="senderInfoModal" tabindex="-1" aria-labelledby="senderInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="senderInfoLabel">Thông tin người gửi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="senderInfoBody">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>


<script>
    function showSenderInfo(userId) {
    // Gửi yêu cầu AJAX để lấy thông tin chi tiết của người gửi
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_user_info.php?user_id=" + userId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Đổ thông tin nhận được vào modal body
                document.getElementById('senderInfoBody').innerHTML = xhr.responseText;
                // Hiển thị modal
                var senderInfoModal = new bootstrap.Modal(document.getElementById('senderInfoModal'), {});
                senderInfoModal.show();
            } else {
                alert('Lỗi khi tải thông tin người gửi.');
            }
        }
    };
    xhr.send();
}

    function updateAssignedTo(messageId, userId, messageContent, senderId) {
        console.log(messageId, userId, messageContent, senderId);
        
        if (userId) {
            // Gửi yêu cầu AJAX để cập nhật assigned_to
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_assigned.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert("Chỉ định thành công!");
                        location.reload(); 
                    } else {
                        alert("Lỗi: " + response.error);
                    }
                }
            };
            xhr.send("message_id=" + messageId + "&assigned_to=" + userId + "&message_content=" + encodeURIComponent(messageContent) + "&sender_id=" + senderId);
        }
    }

    function deleteMessage(messageId) {
        if (confirm("Bạn có chắc chắn muốn xóa tin nhắn này?")) {
            // Gửi yêu cầu AJAX để xóa tin nhắn
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_message.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert("Bạn đã xóa tin nhắn!");
                        location.reload(); // Tải lại trang để cập nhật
                    } else {
                        alert("Lỗi: " + response.error);
                    }
                }
            };
            xhr.send("message_id=" + messageId);
        }
    }
</script>
<!-- /.content-wrapper -->
<?php require 'footer.php'; ?>

<style>
    .chat-messages {
        list-style-type: none;
        padding: 0;
    }
    .chat-message {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
        transition: background 0.3s;
    }
    .chat-message:hover {
        background: #f0f0f0;
    }
    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
