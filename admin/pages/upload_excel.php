<?php
require 'header.php';
require_once "../src/db.php";
global $conn;
?>


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
                        <!-- /.card-header -->
                        <div class="card-header d-flex justify-content-start">
                            <h4>Nhập ca làm từ excel</h4>
                        </div>

                        <div class="card-body table-responsive p-0">
                        <label style="color: red;font-weight: bold;margin-left: 20px;" >Chú ý: </label><label >  Chọn đúng tháng cho các file chấm công</label>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="form-group d-flex justify-content-space-between" style="margin-left: 20px;">
                                    <div style="margin-right: 30px;">
                                        <label for="month">Chọn tháng:</label>
                                        <select id="month" name="month" class="form-control">
                                            <?php for ($m = 1; $m <= 12; $m++): ?>
                                                <option value="<?= $m ?>"><?= $m ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div> 
                                    <div>
                                        <label for="year">Chọn năm:</label>
                                        <select id="year" name="year" class="form-control">
                                            <?php for ($y = date('Y'); $y >= 2000; $y--): ?>
                                                <option value="<?= $y ?>"><?= $y ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group" style="margin-left: 20px;margin-bottom: 20px; width: 50%;">
                                    <label for="file" >Chọn file Excel:</label>
                                    <input require type="file" id="file" name="file" class="form-control" accept=".xlsx, .xls" style="margin-left: 5px;margin-bottom: 5px;">
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-left: 20px;margin-bottom: 20px;">Upload</button>
                            </form>
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

<?php require 'footer_ql.php' ?>