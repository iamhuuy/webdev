<?php

// include('../config/db_connect.php');

$errors = array('username'=>'', 'password1'=>'', 'password2'=>'', 'gender'=>'', 'hobby'=>'');

if (isset($_POST['submit'])) {
    // check username
    if (empty($_POST['username'])) {
        $errors['username'] = 'Tên đăng nhập không được trống';
    } else {
        $username = test_input($_POST['username']);
        if (!preg_match('/^(?=[a-zA-Z0-9._]{5,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/', $username)) {
            $errors['username'] = 'Tên đăng nhập không hợp lệ';
        }
    }

    // check password
    if (empty($_POST['password1'])) {
        $errors['password1'] = 'Mật khẩu không được trống';
    } else {
        $password1 = test_input($_POST['password1']);
        if (!preg_match('/^(?=[a-zA-Z0-9._]{5,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/', $password1)) {
            $errors['password1'] = 'Mật khẩu không hợp lệ';
        }
    }

    // check rewrite password
    if (empty($_POST['password2'])) {
        $errors['password2'] = 'Gõ lại mật khẩu không được trống';
    } else {
        $password2 = test_input($_POST['password2']);
        if (!preg_match('/^(?=[a-zA-Z0-9._]{5,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/', $password2)) {
            $errors['password2'] = 'Gõ lại mật khẩu không hợp lệ';
        } else if ($_POST['password1'] !== $password2) {
            $errors['password2'] = 'Mật khẩu không khớp';
        }
    }

    // check gender
    if (empty($_POST['gender'])) {
        $errors['gender'] = 'Vui lòng chọn giới tính';
    }

    // check hobby
    if (empty($_POST['hobby'])) {
        $errors['hobby'] = 'Chọn ít nhất 1 sở thích';
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form đăng ký - HTML</title>
    <style>
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        span {
            display: block;
        }

        .container {
            max-width: 35%;
            min-width: 400px;
            margin: 10px auto;
            background-color: #fff;
            height: 100%;
        }

        .error {
            color: red;
        }

        #form form {
            border: 1px solid #000;
            padding: 10px;
        }

        #form table {
            background-color: #D8D8D8;
            width: 100%;
        }

        #form table td {
            width: 170px;
            height: 25px;
            padding: 10px;
        }

        #form h3 {
            color: red;
        }

        #form h3,
        #form p {
            text-align: center;
        }

        input[type=text],
        input[type=password],
        select,
        input[type=submit],
        input[type=reset] {
            height: 25px;
        }

        #information table {
            border: .5px solid #505050;
        }

        #information table td,
        #information table th {
            text-align: left;
            padding: 0 5px;
            height: 30px;
        }

        #information table th {
            width: 90px;
        }

        #information table th h2 {
            margin: 0;
            margin-bottom: 10px;
        }
    </style>
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
            <form action="bai2-update.php" method="POST">
                <table>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td>
                            <input type="text" name="username" value="<?php $_POST['username']; ?>">
                            <span class="error"><?php echo $errors['username']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="password" name="password1">
                            <span class="error"><?php echo $errors['password1']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Gõ lại mật khẩu</td>
                        <td>
                            <input type="password" name="password2">
                            <span class="error"><?php echo $errors['password2']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình đại diện</td>
                        <td><input type="file" name="profile_pic"></td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <input type="radio" name="gender" id="male" value="male">
                            <label for="male">Nam</label>

                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female">Nữ</label>

                            <input type="radio" name="gender" id="other" value="other">
                            <label for="other">Khác</label>

                            <span class="error"><?php echo $errors['username']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Nghề nghiệp</td>
                        <td>
                            <select name="job" id="job">
                                <option value="student1">Học sinh</option>
                                <option value="student2">Sinh viên</option>
                                <option value="teacher">Giáo viên</option>
                                <option value="other">Khác</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sở thích</td>
                        <td>
                            <input type="checkbox" name="hobby" id="sport" value="sport">
                            <label for="sport">Thể thao</label>

                            <input type="checkbox" name="hobby" id="travel" value="travel">
                            <label for="travel">Du lịch</label>

                            <input type="checkbox" name="hobby" id="music" value="music">
                            <label for="music">Âm nhạc</label>

                            <input type="checkbox" name="hobby" id="fashion" value="fashion">
                            <label for="fashion">Thời trang</label>

                            <span class="error"><?php echo $errors['hobby']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Đăng ký">
                            <input type="reset" value="Làm lại">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
