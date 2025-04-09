<?php
require_once 'app/config/connect.php';
require_once 'app/Controllers/UserController.php';

$userController = new UserController($conn);
$message = $userController->processRegister();

// Hiển thị form đăng ký
$userController->register();

// Hiển thị thông báo (nếu có)
if ($message) {
    echo $message;
}
?>