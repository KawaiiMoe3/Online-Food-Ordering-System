<?php
    session_start();
    if (isset($_SESSION['login_client'])) {
        unset($_SESSION['login_client']);
    }
    header("location:HomePage.php");
?>