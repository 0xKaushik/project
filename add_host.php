<?php
session_start();

if (!isset($_SESSION["userId"])) {
    header("Location: index.html");
    exit();
}

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hostname = $conn->real_escape_string($_POST["hostname"]);
$ipAddress = $conn->real_escape_string($_POST["ipAddress"]);
$os = $conn->real_escape_string($_POST["os"]);
$VLAN = $conn->real_escape_string($_POST["VLAN"]);

$sql = "INSERT INTO host_info (hostname, ip_address, os, VLAN) VALUES ('$hostname', '$ipAddress', '$os', '$VLAN')";

if ($conn->query($sql) === true) {
    echo "New host added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>