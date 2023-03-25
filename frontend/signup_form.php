<?php
include 'includes/config.php';
$name = "";
$phone = "";
$password = "";
$email = "";
if (isset($_POST['sbtDangKy'])) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $phone = $_POST['usernumber'];
    $password = $_POST['userpassword'];
    $passwordr = $_POST['passwordrepeat'];
    $date = date('d/m/Y H:i:s');
    $kt = 1;
    if ($passwordr != $password) {
        echo "<script>alert('Bạn chưa nhập lại đúng mật khẩu');</script>";
        $kt = 0;
    }
    if (empty($phone)) {
        echo "<script>alert('Bạn chưa nhập số điện thoại');</script>";
        $kt = 0;
    }
    if (mysqli_num_rows(mysqli_query($con, "SELECT email FROM khach_hang WHERE email = '$email'")) > 0) {
        echo "<script>alert('Email này đã được dùng để đăng ký');</script>";
        $kt = 0;
    }
    if (mysqli_num_rows(mysqli_query($con, "SELECT phone FROM khach_hang WHERE phone = '$phone'")) > 0) {
        echo "<script>alert('Số điện thoại này đã được dùng để đăng ký');</script>";
        $kt = 0;
    } else if ($kt == 1) {
        $query = mysqli_query($con, "insert into khach_hang(name,email,phone,password,created) 
        values('$name','$email','$phone','$password','$date')");
        if ($query) {
            echo "<script>alert('Bạn đã đăng ký thành công');</script>";
            header('location: signin_form.php');
        } else {
            echo "<script>alert('Not register something went worng');</script>";
        }
    }
}

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
<section class="vh-150" style="background-color: #9A616D;">
    <a href="index.php" class="text-decoration-none">
        < Quay về trang chủ</a>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="Images/signin.jpg" width="100%" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form method="post" action="signup_form.php">

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">Đăng ký thông tin của bạn!</span>
                                                <hr>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Tạo tài khoản cho riêng bạn</h5>
                                            <div class="form-outline mb-4">
                                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="username" value="<?= $name; ?>" />
                                                <label class="form-label" for="form2Example17">Tên của bạn</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="email" id="form2Example17" class="form-control form-control-lg" name="useremail" value="<?= $email; ?>" />
                                                <label class="form-label" for="form2Example17">Địa chỉ email</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="number" id="form2Example17" class="form-control form-control-lg" name="usernumber" value="<?= $phone; ?>" />
                                                <label class="form-label" for="form2Example17">Số điện thoại</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example27" class="form-control form-control-lg" name="userpassword" value="<?= $password; ?>" />
                                                <label class="form-label" for="form2Example27">Mật khẩu</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example27" class="form-control form-control-lg" name="passwordrepeat" />
                                                <label class="form-label" for="form2Example27">Nhập lại mật khẩu</label>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <input class="btn btn-dark btn-lg btn-block" type="submit" value="Đăng ký" name="sbtDangKy">
                                            </div>

                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn đã có tài khoản? <a href="signin_form.php" style="color: #393f81;">
                                                    Đăng nhập tại đây</a></p>
                                            <a href="#!" class="small text-muted">Điều khoản.</a>
                                            <a href="#!" class="small text-muted">Thông tin pháp lý</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>