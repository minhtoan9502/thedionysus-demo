<?php
include 'header.php';
include('includes/config.php');
$id = $_GET['product'];
//hiển thị thông tin sách cần sửa
$truyvan = "SELECT * FROM san_pham WHERE id = '$id'";
$ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
$r = mysqli_fetch_array($ketqua);
?>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><?= $r['name'] ?></h3>
                <h6 class="card-subtitle">Đồng hồ...</h6>
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= $r['image_link']; ?>" class="d-block w-40" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="Images/2efc66a39fdd598300cc54-1667314777110.jpg" class="d-block w-40" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="Images/dong-ho-casio-mtp-vt01gl-2b_2-ims.jpg" class="d-block w-40" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-6">
                        <h4 class="box-title mt-5">Mô tả</h4>
                        <p><?= $r['content']; ?></p>
                        <h2 class="mt-5">
                            <p><span class="text-decoration-line-through"><?= number_format($r['price']); ?>đ</span><small class="text-success"> (giảm <?= $r['discount']; ?>%)</small></p>
                            <p>Còn lại: <?= number_format($r['price'] - ($r['price'] * $r['discount']/100)); ?>đ</p>
                        </h2>

                        <a class="btn btn-outline-dark mt-auto" href="addItemCart.php?watch=<?= $r['id']; ?>">
                            Thêm vào giỏ
                        </a>

                        <button class="btn btn-primary btn-rounded">Buy Now</button>
                        <h3 class="box-title mt-5">Key Highlights</h3>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                            <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                            <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                        </ul>
                    </div>
                    <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    <tr>
                                        <td width="390">Brand</td>
                                        <td>Stellar</td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Condition</td>
                                        <td>Knock Down</td>
                                    </tr>
                                    <tr>
                                        <td>Seat Lock Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td>Office Chair</td>
                                    </tr>
                                    <tr>
                                        <td>Style</td>
                                        <td>Contemporary&amp;Modern</td>
                                    </tr>
                                    <tr>
                                        <td>Wheels Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Upholstery Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Upholstery Type</td>
                                        <td>Cushion</td>
                                    </tr>
                                    <tr>
                                        <td>Head Support</td>
                                        <td>No</td>
                                    </tr>
                                    <tr>
                                        <td>Suitable For</td>
                                        <td>Study&amp;Home Office</td>
                                    </tr>
                                    <tr>
                                        <td>Adjustable Height</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Model Number</td>
                                        <td>F01020701-00HT744A06</td>
                                    </tr>
                                    <tr>
                                        <td>Armrest Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Care Instructions</td>
                                        <td>Handle With Care,Keep In Dry Place,Do Not Apply Any Chemical For Cleaning.</td>
                                    </tr>
                                    <tr>
                                        <td>Finish Type</td>
                                        <td>Matte</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include 'footer.php';
?>