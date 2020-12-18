<?php
require("../../buoi3/config/connect.php");

$username = $_POST['u'];

$sql = "SELECT tendangnhap FROM thanhvien WHERE tendangnhap='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Tên đăng nhập đã tồn tại";
} else {
    echo "";
}

$conn->close();
?>
