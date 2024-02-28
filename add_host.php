<?php
session_start();

if (!isset($_SESSION["userId"])) {
    header("Location: index.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webappdata";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hostname = filter_var(trim($_POST["hostname"]), FILTER_SANITIZE_STRING);
if (empty($hostname)) {
    die("Hostname is required");
}
$ipAddress = filter_var(trim($_POST["ipAddress"]), FILTER_SANITIZE_STRING);
if (empty($ipAddress)) {
    die("IP Address is required");
}

$os = filter_var(trim($_POST["os"]), FILTER_SANITIZE_STRING);
if (empty($os)) {
    die("Operating system is required");
}
$VLAN = filter_var(trim($_POST["VLAN"]), FILTER_SANITIZE_STRING);
if (empty($VLAN)) {
    die(" VLAN is required");
}


$sql = "INSERT INTO `host_info` (`id`,`hostname`, `ip_address`, `os`, `VLAN`) VALUES (NULL,'$hostname', '$ipAddress', '$os', '$VLAN')";
    if ($conn->query($sql) === true) {
    header("Location: view_host.php");
    }
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>