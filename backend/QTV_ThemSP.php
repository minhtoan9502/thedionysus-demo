<?php
include 'header.php';
include('includes/config.php');

$ten = "";
$hang = "";
$gia = "";
$noidung = "";
$giagiam = "";
$anh = "";
if (isset($_POST['sbtThem'])) {
    $ten = $_POST['ten'];
    $hang = $_POST['hang'];
    $gia = $_POST['gia'];
    $noidung = $_POST['content'];
    $giagiam = $_POST['giamgia'];
    $anh = $_POST['hinhlink'];


    $sach = "INSERT INTO `san_pham`(`id`, `catalog_id`, `name`, `price`, `content`, `discount`, `image_link`, `image_list`, `created`, `view`)
                                 VALUES (NULL,'$hang','$ten','$gia','$noidung','$giagiam','$anh','','0','0')";
    $results = mysqli_query($con, $sach) or die(mysqli_error($con));
    echo 'Thêm thành công!';
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Table sản phẩm</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Thêm SP mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="QTV_ThemSP.php" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm" name="ten">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn hãng</label>
                                    <select class="custom-select custom-select-lg mb-3" name="hang">
                                        <option selected>Hãng sản xuất</option>
                                        <?php
                                        $truyvan = "SELECT * FROM `dm_sp`";
                                        $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                                        $n = mysqli_num_rows($ketqua);
                                        for ($i = 1; $i <= $n; $i++) {
                                            $v = mysqli_fetch_array($ketqua);
                                        ?>
                                            <option value="<?= $v['id']; ?>"><?= $v['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá cả</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm" name="gia">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giảm giá (nếu có)</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="giamgia">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thêm hình ảnh</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Đường dẫn hình" name="hinhlink">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Thêm SP" name="sbtThem">
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