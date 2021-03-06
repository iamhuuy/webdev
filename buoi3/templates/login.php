<?php
require("../config/connect.php");
include("../config/validate-text.php");

if (isset($_POST['submit'])) {
    $username = clean($_POST['username']);
    $password = md5(clean($_POST['password']));

    $sql = "SELECT * FROM thanhvien WHERE tendangnhap='$username' AND matkhau='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();

        $row = $result->fetch_assoc();

        $_SESSION['idtv'] = $row['id'];
        $_SESSION['username'] = $row['tendangnhap'];
        $_SESSION['gender'] = $row['gioitinh'];
        $_SESSION['job'] = $row['nghenghiep'];
        $_SESSION['hobby'] = $row['sothich'];
        $_SESSION['profile_pic'] = $row['hinhanh'];

        header("location: index.php");
    } else {
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng')</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Đăng nhập">
                    <input type="reset" value="Hủy bỏ">
                </td>
            </tr>
        </table>
    </form>
    <span>Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay.</a></span>
</body>
</html>
