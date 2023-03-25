<?php
include 'header.php';
include('includes/config.php');

?>

<section class="bg-danger bg-gradient">
    <table class="container">
        <tr>
            <td width='20%'>
                <div class="row g-1">
                    <div class="col-0">
                        <div class="p-3 border bg-light">

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lọc hãng
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td width='80%'>
                <div class="row g-1">
                    <div class="col-16">
                        <div class="p-3 border bg-secondary">

                            <form action="addItemart.php" method="get">
                                <p class="h3">Các sản phẩm của chúng tôi</p>
                                <!-- Section-->
                                <section class="py-5">
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-l-3 justify-content-center">

                                            <!--Bắt đầu thể sản phẩm-->
                                            <?php
                                            $truyvan = "select * from san_pham";
                                            $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                                            $tongdong = mysqli_num_rows($ketqua);
                                            $tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
                                            $soluong = 6;
                                            $tongsotrang = ceil($tongdong / $soluong);
                                            if ($tranghientai > $tongsotrang) {
                                                $tranghientai = $tongsotrang;
                                            } else if ($tranghientai < 1) {
                                                $current_page = 1;
                                            }
                                            $batdau = ($tranghientai - 1) * $soluong;
                                            $truyvan = "SELECT * FROM san_pham LIMIT $batdau, $soluong";
                                            $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                                            $num = mysqli_num_rows($ketqua);
                                            for ($i = 0; $i < $num; $i++) {
                                                $dong = mysqli_fetch_array($ketqua);
                                            ?>

                                                <div class="col mb-5">
                                                    <div class="card h-100">
                                                        <!-- Sale badge-->
                                                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Mới nhất</div>
                                                        <!-- Product image-->
                                                        <img class="card-img-top" src="<?= $dong['image_link']; ?>" alt="..." />
                                                        <!-- Product details-->
                                                        <div class="card-body p-4">
                                                            <div class="text-center">
                                                                <!-- Product name-->
                                                                <a class="text-decoration-none text-black" href="product_detail.php?product=<?= $dong['id']; ?>">
                                                                    <h5 class="fw-bolder"><?= $dong['name']; ?></h5>
                                                                </a>
                                                                <!-- Product reviews-->
                                                                <div class="d-flex justify-content-center small text-warning mb-2">
                                                                    <div class="bi-star-fill"></div>
                                                                    <div class="bi-star-fill"></div>
                                                                    <div class="bi-star-fill"></div>
                                                                    <div class="bi-star-fill"></div>
                                                                    <div class="bi-star-fill"></div>
                                                                </div>
                                                                <!-- Product price-->
                                                                <span class="text-muted text-decoration-line-through"><?= number_format($dong['price']); ?> đ</span>
                                                                <span><?= number_format($dong['price'] - ($dong['price'] * ($dong['discount'] / 100))); ?> đ</span>
                                                            </div>
                                                        </div>
                                                        <!-- Product actions-->
                                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                            <div class="text-center">
                                                                <a class="btn btn-outline-dark mt-auto" href="addItemCart.php?watch=<?= $dong['id']; ?>">
                                                                    Thêm vào giỏ
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </section>
                            </form>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    if ($tranghientai > 1 && $tongsotrang > 1) {
                                    ?>
                                        <li class="page-item"><a class="page-link" href="products.php?trang=<?= $tranghientai - 1; ?>">Quay lại</a></li>
                                        <?php
                                    }
                                    for ($i = 1; $i <= $tongsotrang; $i++) {
                                        if ($i == $tranghientai) {
                                        ?>
                                            <li class="page-item"><a class="page-link bg-danger" href="#"><?= $i; ?></a></li>
                                    <?php
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href = "products.php?trang=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }
                                    if ($tranghientai < $tongsotrang && $tongsotrang > 1) {
                                        echo '<li class="page-item"><a class="page-link" href = "products.php?trang=' . ($tranghientai + 1) . '">Tiếp theo</a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>



                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    </div>
</section>

<?php
include 'footer.php';
?>