<?php
    if(isset($_POST['id'])){
        $delete_id = $_POST['id'];
        include('includes/config.php');
        
        $sp = "DELETE FROM `khach_hang` WHERE id = '$delete_id'";
                $results = mysqli_query($con, $sp) or die(mysqli_error($con));

                header("location: QTVuser.php");
    }
?>