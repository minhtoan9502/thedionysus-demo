<?php
    session_start();
    $id = $_GET['watch'];
    if(isset($_SESSION['cart'])){
        unset($_SESSION['cart'][$id]);
        header("location: cart.php");
    }
    /* echo $id;
    echo $_SESSION['cart']; */
?>