<?php require 'header.php' ?>
<?php require_once "../src/db.php";
$ca_lam_viec = $conn->query("SELECT * FROM ca_lam_viec"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php if ($_SESSION['role'] == 0) { ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin tất cả nhân viên</h3>
                                <div class="card-tools">
                                    <button onclick="window.location.href='add_nv.php'" class="btn btn-success">Thêm nhân
                                        viên</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>Mã NV</th>
                                            <th>Họ tên</th>
                                            <th>Phòng ban</th>
                                            <th>Chức danh</th>
                                            <th>Mã bộ</th>
                                            <th>Mã nhóm</th>
                                            <th>Mở/khóa tài khoản</th>
                                            <th>Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Câu SQL lấy danh sách
                                        $sql = " SELECT users.*,bo_phan.Ten
                                             FROM users 
                                            JOIN bo_phan ON users.ID_bophan = bo_phan.ID 
                                            ;";
                                        $stt = 0;
                                        // Thực thi câu truy vấn và gán vào $result
                                        $result = $conn->query($sql) or die("Câu lệnh truy vấn sai");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $statusChecked = $row['status'] ? 'checked' : '';
                                            ?>
                                            <tr>
                                                <td><?php echo $row['Ma_nv']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['Ten']; ?></td>
                                                <td><?php echo $row['chucdanh']; ?></td>
                                                <td><?php echo $row['Ma_bo']; ?></td>
                                                <td><?php echo $row['Ma_nhom']; ?></td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" <?php echo $statusChecked; ?>
                                                            onchange="updateStatus('<?php echo $row['Ma_nv']; ?>', this)">

                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" style="background-color: #6c757d; border-color: #6c757d;" onclick="window.location.href='chi_tiet_nv.php?Ma_nv=<?php echo $row['Ma_nv'] ?>'">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545;"
                                                        onclick="if (confirm('Bạn có chắc chắn muốn xóa nhân viên này? Mọi dữ liệu liên quan đến nhân viên sẽ bị xóa!')) window.location.href='xoa_nv.php?x=<?php echo $row['Ma_nv'] ?>'">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    <?php } else {

        $email_bp = $_SESSION['email'];
        $result = $conn->query("SELECT * FROM bo_phan WHERE email = '$email_bp'");
        $row = $result->fetch_assoc();
        $bo_phan_id = $row['ID'];
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin tất cả nhân viên</h3>
                                <div class="card-tools">
                                    <button onclick="window.location.href='add_nv.php'" class="btn btn-success">Thêm nhân
                                        viên</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>Mã NV</th>
                                            <th>Họ tên</th>
                                            <th>Phòng ban</th>
                                            <th>Chức danh</th>
                                            <th>Mã bộ</th>
                                            <th>Mã nhóm</th>
                                            <th>Mở/khóa tài khoản</th>
                                            <th>Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Câu SQL lấy danh sách
                                        $sql = " SELECT users.*,bo_phan.Ten
                                             FROM users 
                                             JOIN bo_phan ON users.ID_bophan = bo_phan.ID
                                             WHERE users.ID_bophan = '$bo_phan_id'
                                            ;";
                                        $stt = 0;
                                        // Thực thi câu truy vấn và gán vào $result
                                        $result = $conn->query($sql) or die("Câu lệnh truy vấn sai");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $statusChecked = $row['status'] ? 'checked' : '';
                                            ?>
                                            <tr>
                                                <td><?php echo $row['Ma_nv']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['Ten']; ?></td>
                                                <td><?php echo $row['chucdanh']; ?></td>
                                                <td><?php echo $row['Ma_bo']; ?></td>
                                                <td><?php echo $row['Ma_nhom']; ?></td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" <?php echo $statusChecked; ?>
                                                            onchange="updateStatus('<?php echo $row['Ma_nv']; ?>', this)">

                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" style="background-color: #6c757d; border-color: #6c757d;">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545;"
                                                        onclick="if (confirm('Bạn có chắc chắn muốn xóa nhân viên này? Mọi dữ liệu liên quan đến nhân viên sẽ bị xóa!')) window.location.href='xoa_nv.php?x=<?php echo $row['Ma_nv'] ?>'">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    <?php } ?>
</div>

<script>
    function updateStatus(maNV, switchElement) {
        const status = switchElement.checked ? 1 : 0; // Trạng thái 1 hoặc 0
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Trạng thái đã được cập nhật.");
            }
        };
        xhr.send("Ma_nv=" + maNV + "&status=" + status);
    }
</script>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 20px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(14px);
    }

    .btn-primary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-primary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
<!-- /.content-wrapper -->

<?php require 'footer_ql.php' ?>