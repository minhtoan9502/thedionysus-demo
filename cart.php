<?php
include 'header.php';
include('includes/config.php');
?>

<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Giỏ hàng của bạn</h1>
                                        <h6 class="mb-0 text-muted"><?= count($cartArray) ?> sản phẩm</h6>
                                    </div>
                                    <?php
                                    error_reporting(0);
                                    if (empty($cartArray)) {
                                        echo "<h2>Giỏ hàng trống</h2>";
                                    } else {
                                        $cartArray = $_SESSION['cart'];
                                        var_dump($cartArray['1']);
                                    }
                                    $total = 0;
                                    $truyvan = "SELECT * FROM san_pham";
                                    $ketqua = mysqli_query($con, $truyvan) or die(mysqli_error($con));
                                    $n = mysqli_num_rows($ketqua);
                                    for ($i = 1; $i <= $n; $i++) {
                                        $v = mysqli_fetch_array($ketqua);
                                        if (isset($cartArray[$v['id']])) {
                                    ?>
                                            <hr class="my-4">

                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="<?= $v['image_link']; ?>" class="img-fluid rounded-3" alt="<?= $v['name']; ?>">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">

                                                    <h6 class="text-black mb-0"><?= $v['name']; ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <!-- <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button> -->
                                                    <form action="updateAmout.php" method="post">
                                                        <input id="form1" min="1" max="<?= $v['storage_left']; ?>" name="quantity" value="<?= $cartArray[$v['id']]; ?>" type="number" class="form-control form-control-sm" onfocusout="this.form.submit()" />
                                                        <input type="hidden" name="id" value="<?= $v['id']; ?>">
                                                        <h6 class="mb-0 text-muted">Số lượng tối đa: <?= $v['storage_left']; ?></h6>
                                                    </form>
                                                    <!-- <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button> -->
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0"><?= number_format($v['price'] - ($v['price'] * ($v['discount'] / 100))); ?> đ</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="deleteItemCart.php?watch=<?= $v['id']; ?>" class="text-muted" onclick="return confirm('Tiếp tục kick khỏi giỏ hàng?');">
                                                        <i class="fas fa-times">
                                                            kick
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                    <?php
                                            $total = $total + ($v['price'] - ($v['price'] * ($v['discount'] / 100))) * $cartArray[$v['id']];
                                        }
                                    }
                                    ?>
                                    <hr class="my-4">

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="products.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Xem tiếp sản phẩm</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Thanh toán và vận chuyển</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase"><?= count($cartArray); ?> sản phẩm</h5>
                                        <h5><?= number_format($total); ?> đ (đã bào gồm VAT)</h5>
                                    </div>

                                    <h5 class="text-uppercase mb-3">Phương thức giao hàng (nội thành TP. HCM, chúng tôi sẽ liên hệ ngoại thành sau khi hoàn tất đặt hàng)</h5>
                                    <!--Chọn phương thúc vận chuyển-->
                                    <div class="mb-4 pb-2">
                                        <form action="cart.php" method="POST">
                                            <select name="gvc" id="myselect" onchange="this.form.submit()">
                                                <?php
                                                $q = "SELECT * FROM van_chuyen";
                                                $r = mysqli_query($con, $q) or die(mysqli_error($con));
                                                $n = mysqli_num_rows($r);
                                                for ($i = 1; $i <= $n; $i++) {
                                                    $vc = mysqli_fetch_array($r);
                                                ?>
                                                    <option value="<?= $vc['price']; ?>"><?= $vc['name']; ?> - <?= number_format($vc['price']); ?>đ</option>
                                                <?php                                                    
                                                }
                                                $gvc = $_POST['gvc'];
                                                ?>
                                            </select>
                                        </form>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Tổng cộng</h5>
                                        <h5><?= number_format($total + $gvc); ?> đ</h5>
                                    </div>

                                    <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Đặt hàng</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Access the array elements
    var itemsAmout =
        <?php echo json_encode($_SESSION['cart']); ?>;


    //test onfocusout
    document.getElementById("form1").addEventListener("focusout", myFunction);

    function myFunction() {
        //alert("Input field lost focus.");
    }


    // Display the array elements
    function updateAmount() {
        var amount = document.getElementById("form1");
        itemsAmout = amount;
    }
    // alert(itemsAmout);
</script>
<?php
include 'footer.php';
?>