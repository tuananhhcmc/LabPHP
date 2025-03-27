<?php   
require_once __DIR__ . '/../Models/NhanVien.php';

class NhanVienController {
    private $nhanvienModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->nhanvienModel = new NhanVien($this->conn);
    }

    public function index() {
        // KHÔNG CÓ session_start() ở ĐÂY
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $nhanviens = $this->nhanvienModel->getAll($start, $limit);
        $total_records = $this->nhanvienModel->getTotalRecords();
        $total_pages = ceil($total_records / $limit);

        include 'app/Views/nhanvien/index.php';
    }

    public function create() {
        // KHÔNG CÓ session_start() ở ĐÂY
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            include 'app/Views/nhanvien/create.php';
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }
    

    public function store() {
        // KHÔNG CÓ session_start() ở ĐÂY
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
                echo "Có lỗi xảy ra khi thêm nhân viên. Xem chi tiết bên trên."; // Thông báo chung
            }
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }
    

    public function edit() {
        // KHÔNG CÓ session_start() ở ĐÂY
        if ($_SESSION['role'] == 'admin') {
            $Ma_NV = $_GET['Ma_NV'];
            $nhanvien = $this->nhanvienModel->getByMaNV($Ma_NV);
            include 'app/Views/nhanvien/edit.php';
        } else {
            echo "Bạn không có quyền thực hiện thao tác này.";
        }
    }

    public function update() {
        // KHÔNG CÓ session_start() ở ĐÂY
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
        // KHÔNG CÓ session_start() ở ĐÂY
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
