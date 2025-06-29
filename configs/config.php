<?php
$host = "localhost";
$db_name = "elerning";
$username = "root";
$password = "";

// Tạo kết nối
$conn = new mysqli($host, $username, $password, $db_name);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>