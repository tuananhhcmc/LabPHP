<?php
require_once 'app/Models/User.php';

class UserController {
    private $userModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->userModel = new User($this->conn);
    }

    public function login() {
        include '../Views/user/login_form.php';
    }

    public function processLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT id, username, password, role FROM users WHERE username = '$username'";
            $result = $this->conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // Loại bỏ password_verify và so sánh trực tiếp
                if ($password == $row["password"]) {
                    // Thiết lập session
                    session_start();
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["role"] = $row["role"];

                    // Chuyển hướng đến trang chính
                    header("Location: index.php");
                    exit();
                } else {
                    return "Sai mật khẩu."; // Trả về thông báo lỗi
                }
            } else {
                return "Tài khoản không tồn tại."; // Trả về thông báo lỗi
            }
        }
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>
