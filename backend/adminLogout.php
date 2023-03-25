<?php
session_start();
if(isset($_SESSION['logined']))
{
    unset($_SESSION['logined']);
    unset($_SESSION['username']);
    header('location: adminLogin.php');
}

?>