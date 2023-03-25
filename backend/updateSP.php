<?php
    include('includes/config.php');
    
    $id = $_POST['id'];
    //sau khi nhaans nuts update
    if (isset($_POST['sbtSua'])) {
        $ten = $_POST['ten'];
        $hang = $_POST['hang'];
        $gia = $_POST['gia'];
        $noidung = $_POST['content'];
        $giagiam = $_POST['giamgia'];
        $anh = $_POST['hinhlink'];
        $kt = 1;
            
            if ($kt == 1) {
            $sach = "UPDATE `san_pham`
            SET `id`='$id',`catalog_id`='$hang',`name`='$ten',`price`='$gia',`content`='$noidung',`discount`='$giagiam',`image_link`='$anh',`image_list`='',`created`='0',`view`='0'
            WHERE id = $id";
            $results = mysqli_query($con, $sach) or die(mysqli_error($con));
            header("location: QTVproducts.php");
            }
    }
    ?>