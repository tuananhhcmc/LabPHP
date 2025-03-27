<?php
require_once 'app/config/connect.php';
require_once 'app/Controllers/UserController.php';

$userController = new UserController($conn);
$userController->logout();

?>
