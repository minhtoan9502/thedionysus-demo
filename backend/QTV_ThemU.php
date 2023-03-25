<?php
include 'header.php';
include('includes/config.php');
$ten = "";
$email = "";
$phone = "";
$addr = "";
if (isset($_POST['sbtThem'])) {
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['address'];
    $password = $_POST['password'];


    $u = "insert into khach_hang(name,email,phone,address,password) 
    values('$ten','$email','$phone','$addr','$password')";
    $results = mysqli_query($con, $u) or die(mysqli_error($con));
    echo "<script>alert('Thêm thành công');</script>";
}
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
                        <li class="breadcrumb-item active">Thêm người dùng mới</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm người dùng</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="QTV_ThemU.php" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên người dùng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Tên người dùng" name="ten" value="<?= $ten; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="<?= $email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        placeholder="Số điện thoại" name="phone" value="<?= $phone; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                        name="password">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Thêm người dùng" name="sbtThem">
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