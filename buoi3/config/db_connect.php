<?php

$dbServerName = 'localhost';
$dbUsername = 'iamhuuy';
$dbPassword = '123qwe';
$dbName = 'buoi3_db';

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

?>
