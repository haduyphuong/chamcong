<?php require 'header.php' ?>
<?php require_once "../src/db.php";
global $conn;
$Idbp = $_GET['id'];
$bo_phan = $conn->query("SELECT clv.*,pcl.Ma_nv
FROM phan_ca_lam pcl
join users u on pcl.Ma_nv = u.Ma_nv 
JOIN ca_lam_viec clv ON pcl.id_calam = clv.ID
join bo_phan bp on bp.ID = u.ID_bophan
WHERE bp.ID = '$Idbp' AND pcl.ngay = CURDATE()");

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ca làm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ca làm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-start">
                                <h4>Danh sách ca làm của nhân viên</h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="example2" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <!-- <th>STT</th> -->
                                            <th>Tên nhân viên</th>
                                            <th>Tên ca làm</th>
                                            <th>Giờ bắt đầu</th>
                                            <th>Giờ kết thúc</th>
                                            <th>Thời gian</th>
                                            <th>Ngày</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        // $sql = " select * from ca_lam_viec";  
                                    
                                        while ($bo_phan && $bo_phan instanceof mysqli_result && $row2 = mysqli_fetch_assoc($bo_phan)) {

                                            ?>
                                            <tr>

                                                <td><?php echo $row2['Ma_nv']; ?></td>
                                                <td><?php echo $row2['Tenca']; ?></td>
                                                <td><?php echo $row2['Gio_bat_dau']; ?></td>
                                                <td><?php echo $row2['Gio_ket_thuc']; ?></td>
                                                <td><?php echo (strtotime($row2['Gio_ket_thuc']) - strtotime($row2['Gio_bat_dau'])) / 3600 . ' hours'; ?>
                                                </td>
                                                <td><?php echo $row2['ngay']; ?></td>
                                        

                                            </tr>
                                        <?php } ?>


                                        <?php
                                       
                                        $s = 0;

                                        if ($bo_phan && $bo_phan instanceof mysqli_result) {
                                            while ($row = mysqli_fetch_assoc($bo_phan)) {


                                                ?>
                                                <tr>
                                                    <!-- <td><?php echo $s += 1; ?></td> -->
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['Tenca']; ?></td>
                                                    <td><?php echo $row['Gio_bat_dau']; ?></td>
                                                    <td><?php echo $row['Gio_ket_thuc']; ?></td>
                                                    <td><?php echo (strtotime($row['Gio_ket_thuc']) - strtotime($row['Gio_bat_dau'])) / 3600 . ' hours'; ?>
                                                    </td>
                                                    <td><?php echo $row['ngay']; ?></td>
                                                    <td>
                                                        <button class="btn btn-primary"
                                                            onclick="window.location.href='edit_phan_ca.php?ID=<?php echo $row['id'] ?>'"><i
                                                                class="fa fa-edit"></i></button>
                                                        <button class="btn btn-danger"
                                                            onclick="if(confirm('Bạn có chắc chắn muốn xóa không?')) window.location.href='xoa_phan_ca.php?x=<?php echo $row['id'] ?>'"><i
                                                                class="fas fa-trash"></i></button>
                                                    </td>

                                                </tr>
                                            <?php }
                                        } ?>
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