<?php
include 'includes/config.php';

$user = '';
if (isset($_POST['sbtDangNhap'])) {
  session_start();
  $user = $_POST['user'];
  $password = $_POST['password'];
  $query = mysqli_query($con, "SELECT * FROM khach_hang 
      WHERE phone = '$user' and password = '$password'");
  $num = mysqli_fetch_array($query);
  if ($num > 0) {
    //$_SESSION['login'] = $_POST['user'];
    //$_SESSION['id'] = $num['id'];
    $_SESSION['username'] = $num['name'];
    $_SESSION['role'] = $num['role'];
    //$status = 1;
    header('location: index.php');
    //var_dump( $_SESSION['username']);
    } 
    else {
      //$status = 0;
?>
      <div class="alert alert-danger" role="alert">
        Sai thông tin đăng nhập hoặc thông tin chưa tồn tại!
      </div>
  <?php
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
<body>
<section class="vh-100" style="background-color: #9A616D;">
<a href="index.php" class="text-decoration-none">< Quay về trang chủ</a>
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

                <form action="signin_form.php" method="post">
                  
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Đăng nhập để mua hàng</span>
                    <hr>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập vào tài khoản của bạn</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="user" value="<?= $user; ?>" />
                    <label class="form-label" for="form2Example17">Số điện thoại</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="form2Example27">Mật khẩu</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <input class="btn btn-dark btn-lg btn-block" type="submit" value="Đăng nhập" name="sbtDangNhap">
                  </div>

                  <a class="small text-muted" href="#!">Quên mật khẩu?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản? <a href="signup_form.php" style="color: #393f81;">Đăng ký tại đây</a></p>
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
</body>
