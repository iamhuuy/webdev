<?php
require("../../buoi3/config/connect.php");
include("../../buoi3/config/validate-text.php");

if (isset($_POST['submit'])) {
    $username = $conn -> real_escape_string(clean($_POST['username']));
    $password = md5($conn -> real_escape_string(clean($_POST['password1'])));
    $profile_pic = "../img/" . $_FILES['profile_pic']['name'];
    $gender = $_POST['gender'];
    $job = $_POST['job'];
    $hobby = implode(", ", $_POST['hobby']);

    $sql = "INSERT INTO thanhvien(tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich)
            VALUES ('$username', '$password', '$profile_pic', '$gender', '$job', '$hobby')";

    if ($conn->query($sql) == TRUE) {
        session_start();
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic);

        $_SESSION['username'] = $username;
        $_SESSION['profile_pic'] = $profile_pic;
        $_SESSION['gender'] = $gender;
        $_SESSION['job'] = $job;
        $_SESSION['hobby'] = $hobby;

        echo "<script>window.location.href='../../buoi3/templates/login.php'</script>";
    } else {
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
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../../buoi3/css/dangky.css">
    <script src="../../buoi4/js/script.js"></script>
    <script src="../../buoi5/js/script.js"></script>
</head>
<body>
    <div class="container">
        <div id="information">
            <table>
                <tr>
                    <th colspan="2"><h2>Thông tin sinh viên</h2></th>
                </tr>
                <tr>
                    <th>Họ tên</th>
                    <td>Trần Thanh Huy</td>
                </tr>
                <tr>
                    <th>MSSV</th>
                    <td>B1704814</td>
                </tr>
            </table>
        </div>
        <div id="form">
            <h3>Đăng ký tài khoản mới</h3>
            <p>Vui lòng điền đầy đủ thông tin bên dưới để đăng ký tài khoản mới</p>
            <form method="post" name="register-form" action="register.php" enctype="multipart/form-data" onsubmit="return validateRegister()">
                <table>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td>
                            <input id="username" type="text" name="username" onblur="checkAccount(this.value)">
                            <span id="username-error" class="text-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="password" name="password1">
                            <span id="password1-error" class="text-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Gõ lại mật khẩu</td>
                        <td>
                            <input type="password" name="password2">
                            <span id="password2-error" class="text-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình đại diện</td>
                        <td>
                            <input type="file" name="profile_pic">
                            <span id="avatar-error" class="text-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <input type="radio" name="gender" id="male" value="Nam" checked>
                            <label for="male">Nam</label>

                            <input type="radio" name="gender" id="female" value="Nữ">
                            <label for="female">Nữ</label>

                            <input type="radio" name="gender" id="other" value="Khác">
                            <label for="other">Khác</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Nghề nghiệp</td>
                        <td>
                            <select name="job" id="job">
                                <option value="Học sinh" selected="selected">Học sinh</option>
                                <option value="Sinh viên">Sinh viên</option>
                                <option value="Giáo viên">Giáo viên</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sở thích</td>
                        <td>
                            <input type="checkbox" name="hobby[]" id="sport" value="Thể thao">
                            <label for="sport">Thể thao</label>

                            <input type="checkbox" name="hobby[]" id="travel" value="Du lịch">
                            <label for="travel">Du lịch</label>

                            <input type="checkbox" name="hobby[]" id="music" value="Âm nhạc">
                            <label for="music">Âm nhạc</label>

                            <input type="checkbox" name="hobby[]" id="fashion" value="Thời trang">
                            <label for="fashion">Thời trang</label>

                            <span id="hobby-error" class="text-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Đăng ký" name="submit">
                            <input type="reset" value="Làm lại">
                        </td>
                    </tr>
                </table>
            </form>
            <span>Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay.</a></span>
        </div>
    </div>
</body>
</html>
