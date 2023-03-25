<?php
include 'header.php';
include('includes/config.php');
$id = $_POST['id'];
//hiển thị thông tin sách cần sửa
$truyvan = "SELECT * FROM dm_sp WHERE id = '$id'";
$ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
$r = mysqli_fetch_array($ketqua);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Bảng người dùng</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Sửa thông tin người dùng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin người dùng</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="updateB.php" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên người dùng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Tên người dùng" name="ten" value="<?= $r['name'];?>">
                                </div>                                
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                <input type="submit" class="btn btn-success" value="Cập nhật" name="sbtSua">
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.row -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php'; ?>