<?php
require_once 'app/Models/NhanVien.php';

class NhanVienController {
    private $nhanvienModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->nhanvienModel = new NhanVien($this->conn);
    }

    public function index() {
        session_start();
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $nhanviens = $this->nhanvienModel->getAll($start, $limit);
        $total_records = $this->nhanvienModel->getTotalRecords();
        $total_pages = ceil($total_records / $limit);

        include '../Views/nhanvien/index.php';
    }

    public function create() {
        session_start();
        if ($_SESSION['role'] == 'admin') {
            include '../Views/nhanvien/create.php';
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }

    public function store() {
        session_start();
        if ($_SESSION['role'] == 'admin') {
            $Ma_NV = $_POST['Ma_NV'];
            $Ten_NV = $_POST['Ten_NV'];
            $Phai = $_POST['Phai'];
            $Noi_Sinh = $_POST['Noi_Sinh'];
            $Ma_Phong = $_POST['Ma_Phong'];
            $Luong = $_POST['Luong'];

            if ($this->nhanvienModel->create($Ma_NV, $Ten_NV, $Phai, $Noi_Sinh, $Ma_Phong, $Luong)) {
                header("Location: index.php");
            } else {
                echo "Có lỗi xảy ra khi thêm nhân viên.";
            }
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }

    public function edit() {
        session_start();
        if ($_SESSION['role'] == 'admin') {
            $Ma_NV = $_GET['Ma_NV'];
            $nhanvien = $this->nhanvienModel->getByMaNV($Ma_NV);
            include '../Views/nhanvien/edit.php';
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }

    public function update() {
        session_start();
        if ($_SESSION['role'] == 'admin') {
            $Ma_NV = $_POST['Ma_NV'];
            $Ten_NV = $_POST['Ten_NV'];
            $Phai = $_POST['Phai'];
            $Noi_Sinh = $_POST['Noi_Sinh'];
            $Ma_Phong = $_POST['Ma_Phong'];
            $Luong = $_POST['Luong'];

            if ($this->nhanvienModel->update($Ma_NV, $Ten_NV, $Phai, $Noi_Sinh, $Ma_Phong, $Luong)) {
                header("Location: index.php");
            } else {
                echo "Có lỗi xảy ra khi cập nhật nhân viên.";
            }
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }

    public function delete() {
        session_start();
        if ($_SESSION['role'] == 'admin') {
            $Ma_NV = $_GET['Ma_NV'];
            if ($this->nhanvienModel->delete($Ma_NV)) {
                header("Location: index.php");
            } else {
                echo "Có lỗi xảy ra khi xóa nhân viên.";
            }
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }
}
?>
