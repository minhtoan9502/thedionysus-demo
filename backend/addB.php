<?php
    include('includes/config.php');
    $ten = $_POST['ten'];
    if(isset($_POST['sbtThem'])){
        $truyvan = "INSERT INTO `dm_sp`(`id`, `name`, `parent_id`, `sort_order`) 
        VALUES ('','$ten','0','0')";
    $results = mysqli_query($con, $truyvan) or die(mysqli_error($con));
    header('location: QTVbrand.php');
    /* var_dump($results);
    exit(); */
    }
?>