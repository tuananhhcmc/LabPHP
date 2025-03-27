<?php
session_start();
require_once 'app/config/connect.php';
require_once 'app/Controllers/NhanVienController.php';

$nhanVienController = new NhanVienController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        $nhanVienController->create();
        break;
    case 'store':
        $nhanVienController->store();
        break;
    case 'edit':
        $nhanVienController->edit();
        break;
    case 'update':
        $nhanVienController->update(); // Gọi action update
        break;
    case 'delete':
        $nhanVienController->delete();
        break;
    default:
        $nhanVienController->index();
        break;
}
?>
