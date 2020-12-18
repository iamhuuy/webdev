<?php
require("../../buoi3/config/connect.php");
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $idtv = $_SESSION['idtv'];

    $sql = "SELECT * FROM sanpham WHERE idtv = '$idtv'";

    $result = $conn->query($sql);
} else {
    header("location: ../../buoi3/templates/index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="../../buoi3/css/style.css">
    <script src="../../buoi5/js/script.js"></script>
</head>
<body>
    <div class="container">
        <?php include "../../buoi3/templates/controller-bar.php" ?>

        <div class="content">
            <table id="product">
                <tr>
                    <td><a href="add-product.php">Thêm sản phẩm</a></td>
                </tr>
                <tr>
                    <td>
                        <h3>Danh sách sản phẩm</h3>
                        Nhập để tìm kiếm: <input type="text" id="filter-name" onkeyup="filterProduct(this.value);">
                    </td>
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
                                echo "<td class='td-hover' onmouseout='' onmouseover=''>".$row['tensp']."<span class='hide'>Hello</span></td>";
                                echo "<td>".$row['giasp']."</td>";
                                echo "<td><a href='#' onclick='loadDetail(".$row['idsp'].")'>Chi tiết</a></td>";
                                echo "<td><a href='../../buoi3/templates/edit-product.php?idsp=".$row['idsp']."'>Sửa</a></td>";
                                echo "<td><a href='../../buoi3/templates/delete-product.php?idsp=".$row['idsp']."'>Xóa</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }

                        $conn->close();
                        ?>
                        <span id="detail"></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
