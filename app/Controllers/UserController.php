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
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->userModel->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: ../qlns"); 
                exit();
            } else {
                $error = "Mật khẩu không đúng.";
                include 'app/Views/user/login_form.php'; 
            }
        } else {
            $error = "Tên đăng nhập không tồn tại.";
            include 'app/Views/user/login_form.php'; 
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
