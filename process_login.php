<?php
require_once 'app/config/connect.php';
require_once 'app/Controllers/UserController.php';

$userController = new UserController($conn);
$userController->processLogin();

$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $user['role']; 
?>
