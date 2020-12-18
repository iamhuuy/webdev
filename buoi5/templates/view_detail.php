<?php 
require("../../buoi3/config/connect.php");
session_start();

$username = $_SESSION['username'];
$idtv = $_SESSION['idtv'];

$idsp = $_GET['idsp'];

$sql = "SELECT idsp,tensp,chitietsp,giasp,hinhanhsp FROM sanpham WHERE idsp = '$idsp' AND idtv = '$idtv'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo json_encode($row);
} else {
    // header("location: product.php");
    echo "fail";
}

$conn->close();
?>