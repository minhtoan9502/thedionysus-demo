<?php
include 'header.php';
include('includes/config.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Các nhãn hàng hay nhà cung cấp</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản trị brand</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hãng/nhà cung cấp</h3>

                            <div class="card-tools">
                                <!--nút search-->
                                <form action="" method="get">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Tìm supplier">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                                                data-target="#addbModal" id="modal">
                                                Thêm Supplier
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-striped">
                            <thead>
                                <tr>
                                    <th>STT#</th>
                                    <th>Mã Supplier</th>
                                    <th>Tên</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                error_reporting(0);
                                $tbS = $_GET['table_search'];
                                if (empty($tbS)) {
                                    $truyvan = "SELECT * FROM dm_sp";
                                } else {
                                    $truyvan = "SELECT * FROM dm_sp WHERE name like '%$tbS%'";
                                }
                                $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                                $tongdong = mysqli_num_rows($ketqua);
                                $tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
                                $soluong = 8;
                                $tongsotrang = ceil($tongdong / $soluong);
                                if ($tranghientai > $tongsotrang) {
                                    $tranghientai = $tongsotrang;
                                } else if ($tranghientai < 1) {
                                    $current_page = 1;
                                }
                                $batdau = ($tranghientai - 1) * $soluong;
                                if (empty($tbS)) {
                                    $truyvan = "SELECT * FROM dm_sp LIMIT $batdau, $soluong";
                                } else {
                                    $truyvan = "SELECT * FROM dm_sp WHERE name like '%$tbS%' LIMIT $batdau, $soluong";
                                }
                                $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                                $num = mysqli_num_rows($ketqua);
                                $stt = 1;
                                for ($i = 0; $i < $num; $i++) {
                                    $dong = mysqli_fetch_array($ketqua);

                                    ?>
                                    <tr>
                                        <td>
                                            <?= $stt++; ?>
                                        </td>
                                        <td>
                                            <?= $dong['id']; ?>
                                        </td>
                                        <td>
                                            <?= $dong['name']; ?>
                                        </td>
                                        <td>
                                            <form action="removeB.php" method="post"
                                                onsubmit="return confirm('Bạn có muốn tiếp tục xoá Supplier này?');">
                                                <input type="hidden" name="id" value="<?= $dong['id']; ?>">
                                                <input type="submit" class="btn btn-block btn-outline-danger btn-xs"
                                                    name="sbtXoa" value="Xoá">
                                            </form>
                                            <form action="QTV_SuaB.php" method="post">
                                                <input type="hidden" name="id" value="<?= $dong['id']; ?>">
                                                <input type="submit" class="btn btn-block btn-outline-success btn-xs"
                                                    name="sbtSua" value="Cập nhật">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <?php
                            if ($tranghientai > 1 && $tongsotrang > 1) {
                                ?>

                                <li class="page-item"><a class="page-link bg-primary"
                                        href="QTVbrand.php?trang=<?= $tranghientai - 1; ?>">&laquo;</a></li>
                                <?php
                            }
                            for ($i = 1; $i <= $tongsotrang; $i++) {
                                if ($i == $tranghientai) {
                                    ?>

                                    <li class="page-item"><a class="page-link bg-danger" href="#">
                                            <?= $i; ?>
                                        </a></li>
                                    <?php
                                } else {
                                    echo '<li class="page-item"><a class="page-link bg-primary" href = "QTVbrand.php?trang=' . $i . '">' . $i . '</a></li>';

                                }
                            }
                            if ($tranghientai < $tongsotrang && $tongsotrang > 1) {

                                echo '<li class="page-item"><a class="page-link bg-primary" href="QTVbrand.php?trang=' . ($tranghientai + 1) . '">&raquo;</a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
<!-- /.row -->
</div>
<!-- /.content-wrapper -->
<!-- Button trigger modal -->


<!-- Modal thêm brand -->
<div class="modal fade" id="addbModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="addB.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên hãng</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên hãng"
                            name="ten">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary" name="sbtThem">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#modal').on('shown.bs.modal', function () {
        $('.modal').trigger('focus')
    })
</script>
<?php include 'footer.php'; ?>