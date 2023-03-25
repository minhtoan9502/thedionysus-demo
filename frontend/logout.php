<?php 
    session_start();
    if(isset($_SESSION['username']))
    {
        unset($_SESSION['username']);
        //unset($_SESSION['giohang']);
        unset($_SESSION['cart']);
    }
    header('Location: index.php');
?>