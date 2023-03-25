<?php
include('includes/config.php');

$id = $_POST['id'];
//sau khi nhaans nuts update
if (isset($_POST['sbtSua'])) {
    $ten = $_POST['ten'];
    $kt = 1;

    if ($kt == 1) {
        $sach = "UPDATE `dm_sp` 
        SET `id`='$id',`name`='$ten',`parent_id`='0',`sort_order`='0' 
        WHERE id = '$id'";
        $results = mysqli_query($con, $sach) or die(mysqli_error($con));
        header("location: QTVbrand.php");
        //var_dump($results);
    }
}
?>