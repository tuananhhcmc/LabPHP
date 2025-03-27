<?php
require_once 'app/config/connect.php';
require_once 'app/Controllers/NhanVienController.php';

$nhanVienController = new NhanVienController($conn);
$nhanVienController->index();
?>
