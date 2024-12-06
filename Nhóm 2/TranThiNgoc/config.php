<?php
 $server = "localhost";
 $user = "root";
 $password = "";
 $db = "tintuc";

$conn = new mysqli($server, $user, $password, $db);

// Ktra
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
