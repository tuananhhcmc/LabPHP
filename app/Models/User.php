<?php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserByUsername($username) {
        $sql = "SELECT id, username, password, role FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>
