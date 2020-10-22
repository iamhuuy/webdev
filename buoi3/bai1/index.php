<?php

session_start();

$gender = $job = $hobby = "";

switch ($_SESSION["gender"]) {
    case "male":
        $gender = "Nam";
    break;
    case "female":
        $gender = "Nữ";
    break;
    case "other":
        $gender = "Khác";
    break;
    default:
        $gender = "Nam";
}

switch ($_SESSION["job"]) {
    case "student1":
        $job = "Học sinh";
    break;
    case "student2":
        $job = "Sinh viên";
    break;
    case "teacher":
        $job = "Giáo viên";
    break;
    case "other":
        $job = "Khác";
    break;
    default:
        $job = "Học sinh";
}

switch ($_SESSION["hobby"]) {
    case "sport":
        $hobby = "Thể thao";
    break;
    case "travel":
        $hobby = "Du lịch";
    break;
    case "music":
        $hobby = "Âm nhạc";
    break;
    case "fashion":
        $hobby = "Thời trang";
    break;
    default:
        $hobby = "Thể thao";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin thành viên</title>
</head>
<body>
    <h1>WELCOME</h1>
    <table>
        <tr>
            <td>Tên đăng nhập</td>
            <td><?php echo $_SESSION['username']; ?></td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td>Nghề nghiệp</td>
            <td><?php echo $job; ?></td>
        </tr>
        <tr>
            <td>Sở thích</td>
            <td><?php echo $hobby; ?></td>
        </tr>
    </table>
</body>
</html>