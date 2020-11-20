<?php
require "../config/connect.php";
session_start();

$username = $_SESSION['username'];
$idtv = $_SESSION['idtv'];

$sql = "SELECT * FROM sanpham WHERE idtv = '$idtv'";

$result = $conn->query($sql);

// if (isset($_GET['submit'])) {
//     $_SESSION['idsp'] = $_GET['check'];
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php include "controller-bar.php" ?>

        <div class="content">
            <table id="product">
                <tr>
                    <td><a href="add-product.php">Thêm sản phẩm</a></td>
                </tr>
                <tr>
                    <td><h3>Danh sách sản phẩm</h3></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if ($result->num_rows <= 0) {
                            echo "Bạn chưa có sản phẩm nào.";
                        } else {
                            echo "<table id='product-list'>";
                            echo "
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th colspan=3>Lựa chọn</th>
                                </tr>
                            ";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row['idsp']."</td>";
                                echo "<td>".$row['tensp']."</td>";
                                echo "<td>".$row['giasp']."</td>";
                                echo "<td><a href='product-detail.php?idsp=".$row['idsp']."'>Chi tiết</a></td>";
                                echo "<td><a href='edit-product.php?idsp=".$row['idsp']."'>Sửa</a></td>";
                                echo "<td><a href='delete-product.php?idsp=".$row['idsp']."'>Xóa</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }

                        $conn->close();
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
