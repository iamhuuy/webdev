<?php
require("../config/connect.php");
session_start();
$idtv = $_SESSION['idtv'];
$idsp = $_GET['idsp'];

$sql = "DELETE FROM sanpham WHERE idsp='$idsp' AND idtv='$idtv'";
$result = $conn->query($sql);

if ($result) {
    header("refresh:1, url=product.php");
    echo "<script>alert('Xóa sản phẩm thành công')</script>";
} else {
    echo "<script>alert('Xóa sản phẩm không thành công')</script>";
}

$conn->close();
?>
