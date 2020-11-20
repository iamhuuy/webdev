<?php
session_start();
require("../config/connect.php");

$username = $_SESSION['username'];
$idtv = $_SESSION['idtv'];

$idsp = $_GET['idsp'];

echo $idsp;

$sql = "SELECT * FROM sanpham WHERE idsp = '$idsp' AND idtv = '$idtv'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $tensp = $_POST['product-name'];
    $chitietsp = $_POST['product-des'];
    $giasp = $_POST['product-cost'];
    $hinhanhsp = "../img/" . $_FILES['product-img']['name'];

    $sql = "UPDATE sanpham
            SET tensp='$tensp', chitietsp='$chitietsp', giasp='$giasp', hinhanhsp='$hinhanhsp'
            WHERE idsp='$idsp' AND idtv='$idtv'";

    echo $sql;
    $result = $conn->query($sql);
    if ($result) {
        move_uploaded_file($_FILES['product-img']['tmp_name'], $hinhanhsp);
        // header("location: product.php");
    }
} else if (isset($_POST['reset'])) {
    $sql = "SELECT * FROM sanpham WHERE idsp = '$idsp' AND idtv = '$idtv'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sản phẩm</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php include("controller-bar.php") ?>
        <div class="content">
            <form action="edit-product.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><h3>Chi tiết sản phẩm</h3></td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td><input type="text" name="product-id" value="<?php echo $idsp ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><input type="text" name="product-name" value="<?php echo $row['tensp'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Chi tiết sản phẩm</td>
                        <td><textarea name="product-des" rows="5" cols="50"><?php echo $row['chitietsp'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Giá sản phẩm</td>
                        <td><input type="number" name="product-cost" value="<?php echo $row['giasp'] ?>"> (VND)</td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td>
                            <img src="<?php echo $row['hinhanhsp'] ?>" alt="" style="height:200px">
                            <input type="file" name="product-img">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Cập nhật">
                            <input type="reset" name="reset" value="Hủy bỏ">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
