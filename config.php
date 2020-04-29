<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123456";
$dbname = "db_cfn";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>