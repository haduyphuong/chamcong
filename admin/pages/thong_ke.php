<?php require 'header.php' ?>
<?php require_once "../src/db.php";
$bo_phan = $conn->query("SELECT * FROM bo_phan");
$ca_lam_viec = $conn->query("SELECT * FROM ca_lam_viec"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thống kê theo tháng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <button onclick="window.location.href='thong_ke_nam.php'" class="btn btn-info">Xem theo Năm</button>
                            <div class="card-tools">
                                <form method="get" action="" style="display: flex;">
                                    <p style="margin: auto;padding-right: 10px;"> Năm</p>
                                    <select name="year" class="form-control" style="width: 100px;">
                                     <?php
                                    $currentYear = date("Y"); // Lấy năm hiện tại
                                    for ($i = $currentYear - 50; $i <= $currentYear + 50; $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                    </select>
                                    <p style="margin: auto;padding-right: 10px;padding-left: 10px;"> Tháng</p>
                                    <select name="month" class="form-control" style="width: 70px;">
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                        <option value="4"> 4</option>
                                        <option value="5"> 5</option>
                                        <option value="6"> 6</option>
                                        <option value="7"> 7</option>
                                        <option value="8"> 8</option>
                                        <option value="9"> 9</option>
                                        <option value="10"> 10</option>
                                        <option value="11"> 11</option>
                                        <option value="12"> 12</option>
                                    </select>
                                    <input type="submit" name="search" value="Tìm kiếm" class="btn-primary" />
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Mã nhân viên</th>
                                        <th>Họ tên</th>
                                        <th>Mã phòng ban</th>
                                        <th>Tên phòng ban</th>
                                        <th>Tên bộ phận</th>
                                        <th>Số ngày đi làm</th>
                                         <th>Số giờ đã làm</th>
                                         <th>Số giờ thiếu</th>
                                         <th>Số giờ tăng ca</th>
                                        <!--<th>Toàn bộ số ngày đã đi làm</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $year = date('Y');
                                    $month = date('m');
                                    if (isset($_GET['search'])) {
                                        $year = intval($_GET['year']);
                                        $month = intval($_GET['month']);
                                    }
                                    echo "<h5>Tháng $month</h5>";
                                    $email = $_SESSION['email'];
                                    $sqlpb = "SELECT ID FROM bo_phan WHERE email = '$email'";
                                    $resultbp = $conn->query($sqlpb);
                                    $row1 = $resultbp->fetch_assoc();
                                    if(mysqli_num_rows($resultbp) > 0){
                                        $Idbp = $row1['ID'];
                                        $sql = "SELECT nv.Ma_nv, nv.username, bp.Ten, bp.ma_pb, bp.ten_bp
                                                FROM users nv
                                                JOIN bo_phan bp ON nv.ID_bophan = bp.ID
                                                WHERE bp.ID = '$Idbp'";
                                        
                                    }
                                    else{
                                    

                                        $sql = "SELECT nv.Ma_nv, nv.username, bp.Ten, bp.ma_pb, bp.ten_bp, nv.*
                                        FROM users nv
                                        JOIN bo_phan bp ON nv.ID_bophan = bp.ID";

                                    }
                                    $result = mysqli_query($conn, $sql) or die("Câu truy vấn sai!");
                                    if ($result) {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $manv = $row['Ma_nv'];
                                                require_once "../src/function.php";
                                                //Số day đi làm trong tháng
                                                $day = $conn->query("SELECT * FROM cham_cong where Ma_nv = '$manv'and MONTH(Ngay) = '$month'");
                                                $days = $day->num_rows;

                                                 // Tổng số giờ làm trong tháng và số giờ thiếu
                                                 $sql_hours = "SELECT SUM(so_gio_lam) AS total_hours, SUM(so_gio_thieu) AS total_missing_hours FROM cham_cong WHERE Ma_nv = '$manv' AND MONTH(Ngay) = '$month'";
                                                 $result_hours = $conn->query($sql_hours);
                                                 $hours_row = $result_hours->fetch_assoc();
                                                 $total_hours = $hours_row['total_hours'] ?? 0;
                                                 $total_missing_hours = $hours_row['total_missing_hours'] ?? 0;
                                                //Số day đi làm trong năm
                                                $day2 = $conn->query("SELECT * FROM cham_cong where Ma_nv = '$manv'and YEAR(Ngay) ='$year'");
                                                $day2s = $day2->num_rows;
                                                //Tổng 
                                                $tong = $conn->query("SELECT * FROM cham_cong where Ma_nv = '$manv'");
                                                $tongg = $tong->num_rows;


                                                $sql_overtime = "SELECT Ma_nv, SUM(TIMESTAMPDIFF(HOUR, Gio_bat_dau, Gio_ket_thuc)) AS total_overtime 
                                                FROM tang_ca 
                                                WHERE Ma_nv = '$manv' AND MONTH(Ngay) = '$month' AND YEAR(Ngay) = '$year'";
                                                $result_overtime = $conn->query($sql_overtime);
                                                $overtime_row = $result_overtime->fetch_assoc();
                                                $total_overtime = $overtime_row['total_overtime'] ?? 0;

                                    ?>
                                                <tr>
                                                    <td><?php echo $row['Ma_nv']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['ma_pb']; ?></td>
                                                    <td><?php echo $row['Ten']; ?></td>
                                                    <td><?php echo $row['ten_bp']; ?></td>
                                                    <td><?php echo $days ?></td>
                                                    <td><?php echo $total_hours . ' giờ'; ?></td>
                                                    <td><?php echo $total_missing_hours . ' giờ'; ?></td>
                                                    <td><?php echo $total_overtime . ' giờ'; ?></td>
                                            <!-- <td><?php echo $tongg ?></td> -->
                                                </tr>
                                            <?php }
                                            mysqli_free_result($result);
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;">Không có dữ liệu trong bảng</td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "ERROR: Không thể thực thi câu lệnh $sql. ";
                                    }
                                    // Đóng kết nối
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require 'footer_ql.php' ?>