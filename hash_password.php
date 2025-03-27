<?php
$password = '1234'; // Thay bằng password bạn muốn
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password; // In ra password đã hash
?>
