<?php
require_once 'app/Models/User.php';

class UserController
{
    private $userModel;
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->userModel = new User($this->conn);
    }

    public function register()
    {
        $file = __DIR__ . '/../Views/user/register_form.php';
        if (file_exists($file)) {
            include $file;
        } else {
            die("Error: Cannot find register_form.php at $file");
        }
    }


    public function processRegister()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            if (empty($username) || empty($password) || empty($confirm_password)) {
                return "Vui lòng điền đầy đủ thông tin.";
            }

            if ($password !== $confirm_password) {
                return "Mật khẩu xác nhận không khớp.";
            }

            $sql = "SELECT id FROM users WHERE username = '$username'";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                return "Tên tài khoản đã tồn tại.";
            }

            $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
            if ($this->conn->query($sql) === TRUE) {
                header("Location: login.php?register=success");
                exit();
            } else {
                return "Lỗi khi đăng ký: " . $this->conn->error;
            }
        }
    }

    public function login()
    {
        include '../Views/user/login_form.php';
    }

    public function processLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT id, username, password, role FROM users WHERE username = '$username'";
            $result = $this->conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if ($password == $row["password"]) {
                    session_start();
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["role"] = $row["role"];
                    header("Location: index.php");
                    exit();
                } else {
                    return "Sai mật khẩu.";
                }
            } else {
                return "Tài khoản không tồn tại.";
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>