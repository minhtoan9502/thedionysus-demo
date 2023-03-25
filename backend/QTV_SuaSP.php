<?php
include 'header.php';
include('includes/config.php');

    $id = $_POST['id'];
    //hiển thị thông tin sách cần sửa
    $truyvan = "SELECT * FROM san_pham WHERE id = '$id'";
    $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
    $r = mysqli_fetch_array($ketqua);
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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật sản phẩm mới</li>
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
                            <h3 class="card-title">Cập nhật sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="updateSP.php" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm" name="ten" value="<?= $r['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn hãng</label>
                                    <select class="custom-select custom-select-lg mb-3" name="hang">
                                        <option selected>Chọn hãng</option>
                                        <?php
                                        $truyvan = "SELECT * FROM `dm_sp`";
                                        $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                                        $n = mysqli_num_rows($ketqua);
                                        for ($i = 1; $i <= $n; $i++) {
                                            $v = mysqli_fetch_array($ketqua);
                                        ?>
                                            <option value="<?= $r['catalog_id'] ?>"><?= $v['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá cả</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm" name="gia"  value="<?= $r['price'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" ><?= $r['content'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giảm giá (nếu có)</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="giamgia"  value="<?= $r['discount'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thêm hình ảnh</label>
                                    <img src="<?= $r['image_link'] ?>">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Đường dẫn hình" name="hinhlink" value="<?= $r['image_link'] ?>">
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
                                <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                <input type="submit" class="btn btn-success" value="Cập nhật SP" name="sbtSua">
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