<?php

$conn = new mysqli("localhost", "root", "", "buoi3");
$conn->set_charset("utf-8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>