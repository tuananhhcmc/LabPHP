<?php
$servername = "localhost";
$username = "root"; // Thay đổi
$password = ""; // Thay đổi
$dbname = "QL_NhanSu";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>
