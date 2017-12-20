<?php
session_start();
$_SESSION["TenKhachHang"] = null;
$_SESSION["TaiKhoan"] = null;
$_SESSION["giohang"] = null;
var_dump($_SESSION);
header('Location: ./index.php');
?>