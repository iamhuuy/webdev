<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $profile_pic = $_SESSION['profile_pic'];
    $gender = $_SESSION['gender'];
    $job = $_SESSION['job'];
    $hobby = $_SESSION['hobby'];
} else {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php include "controller-bar.php" ?>

        <div class="content">
            <table id="info-father">
                <tr>
                    <td colspan=2><h3>Thông tin cá nhân</h3></td>
                </tr>
                <tr>
                    <td id="img"><img src="<?php echo $profile_pic ?>" alt="avatar"></td>
                    <td>
                        <table id="info-child">
                            <tr>
                                <th>Tên người dùng</th>
                                <td><?php echo $username ?></td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td><?php echo $gender ?></td>
                            </tr>
                            <tr>
                                <th>Nghề nghiệp</th>
                                <td><?php echo $job ?></td>
                            </tr>
                            <tr>
                                <th>Sở thích</th>
                                <td><?php echo $hobby ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
