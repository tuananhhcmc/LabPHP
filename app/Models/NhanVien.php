<?php
class NhanVien {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll($start, $limit) {
        $sql = "SELECT NV.Ma_NV, NV.Ten_NV, NV.Phai, NV.Noi_Sinh, PB.Ten_Phong, NV.Luong
                FROM NHANVIEN NV
                JOIN PHONGBAN PB ON NV.Ma_Phong = PB.Ma_Phong
                LIMIT $start, $limit";

        $result = $this->conn->query($sql);
        $nhanviens = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nhanviens[] = $row;
            }
        }
        return $nhanviens;
    }

    public function getTotalRecords() {
        $sql_total = "SELECT COUNT(*) AS total FROM NHANVIEN";
        $result_total = $this->conn->query($sql_total);
        $row_total = $result_total->fetch_assoc();
        return $row_total['total'];
    }

    public function create($Ma_NV, $Ten_NV, $Phai, $Noi_Sinh, $Ma_Phong, $Luong) {
        $sql = "INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong)
                VALUES ('$Ma_NV', '$Ten_NV', '$Phai', '$Noi_Sinh', '$Ma_Phong', $Luong)";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . $this->conn->error; // Hiển thị thông báo lỗi
            return false;
        }
    }

    public function getByMaNV($Ma_NV) {
        $sql = "SELECT Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong FROM NHANVIEN WHERE Ma_NV = '$Ma_NV'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function update($Ma_NV, $Ten_NV, $Phai, $Noi_Sinh, $Ma_Phong, $Luong) {
        $sql = "UPDATE NHANVIEN SET Ten_NV = '$Ten_NV', Phai = '$Phai', Noi_Sinh = '$Noi_Sinh',
                        Ma_Phong = '$Ma_Phong', Luong = $Luong
                WHERE Ma_NV = '$Ma_NV'";
        return $this->conn->query($sql);
    }

    public function delete($Ma_NV) {
        $sql = "DELETE FROM NHANVIEN WHERE Ma_NV = '$Ma_NV'";
        return $this->conn->query($sql);
    }
}
?>
