<?php
session_start(); 
session_destroy();
var_dump($_SESSION["TenKhachHang"]);
var_dump($_SESSION["TaiKhoan"]);
var_dump($_SESSION["giohang"]);
?>