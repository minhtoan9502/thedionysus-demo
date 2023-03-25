<?php
include('includes/config.php');

$id = $_POST['id'];
//sau khi nhaans nuts update
if (isset($_POST['sbtSua'])) {
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['address'];
    $password = $_POST['password'];
    $kt = 1;

    if ($kt == 1) {
        $sach = "UPDATE `khach_hang` 
        SET `id`='$id',`name`='$ten',`email`='$email',`phone`='$phone',`address`='$addr',`password`='$password',`created`='0',`role`='2'
        WHERE id = '$id'";
        $results = mysqli_query($con, $sach) or die(mysqli_error($con));
        header("location: QTVuser.php");
        //var_dump($results);
    }
}
?>