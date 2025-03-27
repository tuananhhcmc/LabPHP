<?php
require_once 'app/config/connect.php';
require_once 'app/Controllers/UserController.php';

$userController = new UserController($conn);
$message = $userController->processLogin();

// Hiển thị thông báo lỗi (nếu có)
if ($message) {
    echo $message;
}
?>
