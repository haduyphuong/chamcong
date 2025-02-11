<?php require 'header.php' ?>
<?php require 'table.html' ?>
<?php require_once "../src/db.php";
global $conn;
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tài khoản admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm tài khoản</h3>

                </div>
                <form method="post">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <button type="submit" name="btn" class="btn btn-success w-100">Tạo tài khoản</button>

                        </div>



                        <!-- </div> -->

                        <!-- </div> -->



                    </div>
                    <?php
                    if (isset($_POST['btn'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $sql = " select * from users where username='$username'";

                        $result = mysqli_query($conn, $sql);

                        $dem = mysqli_num_rows($result);
                        if ($dem > 0) {
                            echo "<span class='text-danger pl-3'>Username Đã Tồn Tại</span>";
                            exit();
                        } else {
                            $sql1 = "INSERT INTO users (username, password, email, role, active_message, active_message_nb, approve_message, TK_admin, QL_Nhanvien, QL_phongban, Ql_calamviec, Chamtangca, Chambu, Phanquyen, Duyetchamcong, Sualichlam, Phophong,  status, login) VALUES('$username', '$password', '$username@gmail.com', 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0,  1, 1);
";
                            $result1 = mysqli_query($conn, $sql1);
                            if ($result1 == true) {
                                echo "<span class='text-success pl-3'>Tạo tài khoản thành công</span>";
                            } else {
                                echo "<script> alert('Có lỗi xảy ra: " . mysqli_error($conn) . "');</script>";
                            }
                        }
                    }
                    ?>
                </form>

            </div>
    </section>
</div>

<?php require 'footer_ql.php' ?><?php require 'header.php' ?>
<?php require_once "../src/db.php";
global $conn;
$bo_phan = $conn->query("SELECT * FROM bo_phan"); ?>
<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Phòng ban</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Phòng ban</a></li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quản lý phòng ban</h3>
                </div>
                <form method="post">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tên phòng ban</label>
                                    <input type="text" name='ten' required class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mã phòng ban</label>
                                    <input type="text" name='ma_pb' required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Bộ phận</label>
                                    <input type="text" name='ten_bp' required class="form-control">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name='password' required class="form-control">
                                </div>
                            </div> -->
                        </div>

                        <button type="submit" name="btn" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['btn'])) {
                    $ten = $_POST['ten'];
                    $ma_pb = $_POST['ma_pb'];
                    $ten_bp = $_POST['ten_bp'];
                    $sql = "SELECT * from bo_phan where ten_pb = '$ten'";
                    $result = mysqli_query($conn, $sql);
                    $dem = mysqli_num_rows($result);
                    if ($dem > 0) {
                        echo "Tồn tại";
                        exit();
                    } else {
                        $sql = "INSERT INTO bo_phan(ten_pb, ma_pb, ten_bp) VALUES('$ten', '$ma_pb','$ten_bp')";
                        $result = mysqli_query($conn, $sql);
                        if ($result == true) {
                            echo "Thêm phòng ban thành công <a href='ql_bo_phan.php'>Danh sách</a>";
                        }
                    }
                }
                ?>
            </div>
    </section>
</div>
<?php require 'footer.php' ?>