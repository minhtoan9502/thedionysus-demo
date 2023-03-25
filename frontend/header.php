<?php session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>theDionysus - Store đồng hồ nam dỏm cho phái mạnh</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">theDionysus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">Về chúng tôi</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="products.php">Tất cả sản phẩm</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Sản phẩm phổ biến</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="row g-3">
                    <div class="col">
                        <a class="d-flex" href="cart.php">
                            <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Giỏ
                                <?php
                                if(!isset($_SESSION['cart'])){
                                ?>
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                                <?php }
                                else{
                                $cartArray = $_SESSION['cart'];
                                    ?>
                                <span class="badge bg-dark text-white ms-1 rounded-pill"><?= count($cartArray);?></span>
                                <?php 
                                }
                                ?>
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                if (isset($_SESSION['username']) && $_SESSION['username']) {
                                ?>
                                    Hi, <?= $_SESSION['username']; ?>
                                <?php
                                } else {
                                    echo 'Chào khách hàng';
                                }
                                ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <?php
                                if (isset($_SESSION['username']) && $_SESSION['username']) {
                                    if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                                        echo '<li><a href="backend/index.php"><button class="dropdown-item" type="button">Quản trị viên</button></a>';
                                    }
                                    ?>
                                    <li><a href="logout.php"><button class="dropdown-item" type="button">Đăng xuất</button></a>

                                    <?php
                                } else {
                                    ?>
                                    <li><a href="signin_form.php"><button class="dropdown-item" type="button">Đăng nhập</button></a></li>
                                    <li><a href="signup_form.php"><button class="dropdown-item" type="button">Đăng ký</button></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </nav>