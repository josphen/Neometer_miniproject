<?php
    session_start();
    session_destroy();
    unset($_SESSION['LoginUser']);
    header('location:lp.php');
?>