<?php
    session_start();
    $id = $_POST['id'];
    $sl = $_POST['quantity'];
    if(isset($_SESSION['cart'])){
        $_SESSION['cart'][$id] = $sl;
        header('location: cart.php');
    }
?>