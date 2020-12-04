<?php
session_start();
require("../config/connect.php");

$username = $_SESSION['username'];
$idtv = $_SESSION['idtv'];

$idsp = $_GET['idsp'];

$sql = "SELECT * FROM sanpham WHERE idsp = '$idsp' AND idtv = '$idtv'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    // echo "<script>alert('Bạn không sở hữu sản phẩm này !!!')</script>";
    // $row['idsp'] = "";
    // $row['tensp'] = "";
    // $row['chitietsp'] = "";
    // $row['giasp'] = "";
    // $row['hinhanhsp'] = "";
    header("location: product.php");
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php include("controller-bar.php") ?>
        <div class="content">
            <table>
                <tr>
                    <td><h3>Chi tiết sản phẩm</h3></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td><input type="text" value="<?php echo $row['idsp'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" value="<?php echo $row['tensp'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Chi tiết sản phẩm</td>
                    <td><textarea rows="5" cols="50" disabled><?php echo $row['chitietsp'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td><input type="number" value="<?php echo $row['giasp'] ?>" disabled> (VND)</td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td><img src="<?php echo $row['hinhanhsp'] ?>" alt="" style="height:200px"></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
