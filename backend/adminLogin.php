<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin 'theDionysus'</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <?php
include 'includes/config.php';

$user = '';
if (isset($_POST['sbtDangNhap'])) {
    session_start();
    $user = $_POST['user'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT * FROM admin
          WHERE username = '$user' and password = '$password'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        $_SESSION['logined'] = $_POST['user'];
        //$_SESSION['id'] = $num['id'];
        $_SESSION['uname'] = $num['name'];
        //$_SESSION['role'] = $num['role'];
        
        //$status = 1;
        header('location: index.php');
        //var_dump( $_SESSION['username']);
    } else {
        //$status = 0;
        ?>
          <div class="alert alert-danger" role="alert">
            Sai thông tin đăng nhập hoặc thông tin chưa tồn tại!
          </div>
      <?php
}
}
?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>theDionysus</b><br>Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Mời 'Admin' đăng nhập</p>

      <form action="adminLogin.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Tên đăng nhập" name="user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ghi nhớ tớ
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="sbtDangNhap">Log in</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
