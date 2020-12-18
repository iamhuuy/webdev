<?php
require("../../buoi3/config/connect.php");
session_start();
$value = $_POST['value'];

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $idtv = $_SESSION['idtv'];

    $sql = "SELECT * FROM sanpham WHERE idtv = '$idtv' AND tensp LIKE '%".$value."%'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo json_encode($row);
} else {
    header("location: ../../buoi3/templates/index.php");
}
$conn->close();
?>
