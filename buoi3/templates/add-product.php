<?php
require("../config/connect.php");
session_start();

$username = $_SESSION['username'];
$idtv = $_SESSION['idtv'];

if (isset($_POST['submit'])) {
    $tensp = $_POST['product-name'];
    $chitietsp = $_POST['product-des'];
    $giasp = $_POST['product-cost'];
    $hinhanhsp = "../img/" . $_FILES['product-img']['name'];

    $sql = "INSERT INTO sanpham(tensp, chitietsp, giasp, hinhanhsp, idtv)
            VALUES ('$tensp', '$chitietsp', '$giasp' , '$hinhanhsp', '$idtv')";

    if($conn->query($sql) == TRUE) {
        move_uploaded_file($_FILES['product-img']['tmp_name'], $hinhanhsp);
        echo "<script>alert('Thêm sản phẩm thành công')</script>";
    } else {
        echo "<script>alert('Thêm sản phẩm thất bại')</script>";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php include("controller-bar.php") ?>

        <div class="content">
            <form id="add-product" action="add-product.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><h3>Thêm sản phẩm</h3></td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><input type="text" name="product-name" required></td>
                    </tr>
                    <tr>
                        <td>Chi tiết sản phẩm</td>
                        <td><textarea name="product-des" rows="5" cols="50"></textarea></td>
                    </tr>
                    <tr>
                        <td>Giá sản phẩm</td>
                        <td><input type="number" name="product-cost" required> (VND)</td>
                    </tr>
                    <tr>
                        <td>Hình đại diện</td>
                        <td><input type="file" name="product-img"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Lưu sản phẩm">
                            <input type="reset" value="Hủy bỏ">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
