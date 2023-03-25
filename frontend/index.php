<?php
include 'header.php';
include('includes/config.php');

?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">theDionysus</h1>
            <p class="lead fw-normal text-white-50 mb-0">Đồng hồ nam dỏm giá cắt cổ</p>
        </div>
    </div>
</header>
<!--add hình nền-->

    <form action="addItemcart.php" method="get">
        <!-- Section-->
        <section class="py-5">
            <div class="p-3 text-center">
                <h1 class="mb-3">Sản phẩm nổi bật</h1>
                <hr>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <!--Bắt đầu thể sản phẩm-->
                    <?php
                    $truyvan = "select * from san_pham";
                    $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                    for ($i = 1; $i <= 8; $i++) {
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
                                        <h5 class="fw-bolder"><?= $dong['name']; ?></h5>
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
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="addItemCart.php?watch=<?= $dong['id']; ?>">Thêm vào giỏ</a></div>
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

<?php
include 'footer.php';
?>