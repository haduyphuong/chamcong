<?php require 'header.php' ?>
<?php require 'table.html' ?>
<?php require_once "../src/db.php";
global $conn;
$bo_phan = $conn->query("SELECT * FROM bo_phan");
$ca_lam_viec = $conn->query("SELECT * FROM ca_lam_viec"); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm nhân viên</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
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
                    <h3 class="card-title">Thêm nhân viên</h3>

                </div>
                <form method="post">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mã nhân viên</label>
                                    <input type="text" name="manv" class="form-control" placeholder="Mã nhân viên"
                                        required value="NV">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tên nhân viên</label>
                                    <input type="text" name="ten" class="form-control" required
                                        placeholder="Tên nhân viên">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Giới tính</label><br>
                                    <input type="radio" name="gioitinh" value="Nam" checked="checked">
                                    <label>Nam</label>
                                    <input type="radio" name="gioitinh" value="Nữ">
                                    <label>Nữ</label>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phòng ban</label>
                                    <select name="bophan" id="bophan" required class="form-control">
                                        <?php while ($row = $bo_phan->fetch_assoc()): ?>
                                            <option value="<?php echo $row['ID'] ?>"><?php echo $row['Ten'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Chức danh</label>
                                    <input type="text" name="chucdanh" class="form-control" placeholder="Chức danh"
                                        required value="">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mã bộ</label>
                                    <input type="text" name="mabo" class="form-control" placeholder="Mã bộ" required
                                        value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mã nhóm</label>
                                    <input type="text" name="manhom" class="form-control" placeholder="Mã nhóm" required
                                        value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-2">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email đăng nhập</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"  onclick="togglePassword()"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                </div>
                            </div>
                            
                        </div>


                        <button type="submit" name="btn" class="btn btn-primary">Thêm</button>
                    </div>
                    <?php echo generateTogglePasswordScript(); ?>
                    <?php
                    function generateTogglePasswordScript() {
                        return '
                        <script>
                            function togglePassword() {
                                var passwordField = document.getElementById("password");
                                if (passwordField.type === "password") {
                                    passwordField.type = "text";
                                } else {
                                    passwordField.type = "password";
                                }
                            }
                        </script>
                        ';
                    }
                    
                    if (isset($_POST['btn'])) {
                        $ma = $_POST['manv'];
                        $ten = $_POST['ten'];
                        $gt = $_POST['gioitinh'];
                        $chucdanh = $_POST['chucdanh'];
                        $bophan = $_POST['bophan'];
                        $mabo = $_POST['mabo'];
                        $manhom = $_POST['manhom'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $status = 1;
                        $login = 0;
                    
                        // Câu SQL lấy danh sách
                        $sql = " select * from users where Ma_nv='$ma'";
                        // Thực thi câu truy vấn và gán vào $result
                        $result = mysqli_query($conn, $sql);
                        // Kiểm tra số lượng record trả về có lơn hơn 0
                        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                        $dem = mysqli_num_rows($result);
                        if ($dem > 0) {
                            echo "Mã Nhân Viên Đã Tồn Tại";
                            exit();
                        } else {
                            $sql = "INSERT INTO users(username, password, email, role, active_message, active_message_nb, approve_message, TK_admin, QL_Nhanvien, QL_phongban, Ql_calamviec, Chamtangca, Chambu, Phanquyen, Duyetchamcong, Sualichlam, Phophong, Ma_nv, Gioitinh, ID_bophan, chucdanh, Ma_bo, Ma_nhom, status, login) VALUES('$ten', '$password', '$email', 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$ma', '$gt', '$bophan', '$chucdanh', '$mabo', '$manhom', '$status', '$login')";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            
                            if ($result == true ) {
                                echo "Thêm Thành Công !Hãy vào <a href='ql_nhan_vien.php'>Danh sách nhân viên </a> để xem lại";
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

<?php require 'footer_ql.php' ?>