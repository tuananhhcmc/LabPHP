<?php
require_once 'app/config/connect.php';
require_once 'app/Controllers/UserController.php';

$userController = new UserController($conn);
$userController->processLogin();
// Sau khi xác thực thành công
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $user['role']; // Thiết lập biến $_SESSION['role']
?>
