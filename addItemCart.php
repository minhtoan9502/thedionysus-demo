<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location: signin_form.php');
    }
    else{
    $id = $_GET['watch'];
    if(isset($_SESSION['cart'][$id])){
        $sl = $_SESSION['cart'][$id] + 1;
    }
    else{ $sl = 1;}
    $_SESSION['cart'][$id] = $sl;
    //var_dump($_SESSION['cart']);
    header("location: cart.php");
    exit();}
?>