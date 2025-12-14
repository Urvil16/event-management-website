<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['uname'])) {
    echo "<script>window.location.assign('registration.php');</script>";
    exit;
}
?>