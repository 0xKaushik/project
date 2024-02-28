<?php
session_start();

if (!isset($_SESSION["userId"])) {
    header("Location: index.html");
    exit();
}
?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webappdata";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$serialNum = isset($_POST["serialNum"]) ? filter_var(trim($_POST["serialNum"]), FILTER_SANITIZE_STRING) : '';
if (empty($serialNum)) {
    die("Serial Number is required");
}

$modelNum = isset($_POST["modelNum"]) ? filter_var(trim($_POST["modelNum"]), FILTER_SANITIZE_STRING) : '';
if (empty($modelNum)) {
    die("Model Number is required");
}

$ipAddress = isset($_POST["ipAddress"]) ? filter_var(trim($_POST["ipAddress"]), FILTER_SANITIZE_STRING) : '';
if (empty($ipAddress)) {
    die("IP Address is required");
}

$hostname = isset($_POST["hostname"]) ? filter_var(trim($_POST["hostname"]), FILTER_SANITIZE_STRING) : '';
if (empty($hostname)) {
    die("Hostname is required");
}

$empName = isset($_POST["empName"]) ? filter_var(trim($_POST["empName"]), FILTER_SANITIZE_STRING) : '';
if (empty($empName)) {
    die("Employee Name is required");
}

$dept = isset($_POST["dept"]) ? filter_var(trim($_POST["dept"]), FILTER_SANITIZE_STRING) : '';
if (empty($dept)) {
    die("Department is required");
}

$location = isset($_POST["location"]) ? filter_var(trim($_POST["location"]), FILTER_SANITIZE_STRING) : '';
if (empty($location)) {
    die("Location is required");
}

$VLAN = isset($_POST["VLAN"]) ? filter_var(trim($_POST["VLAN"]), FILTER_SANITIZE_STRING) : '';
if (empty($VLAN)) {
    die("VLAN is required");
}

$remarks = isset($_POST["Remarks"]) ? filter_var(trim($_POST["Remarks"]), FILTER_SANITIZE_STRING) : '';
if (empty($Remarks)) {
    die("Remarks are required");
}
$sql = "INSERT INTO `host_info` (`serialNum`,`modelNum`, `ipAddress`, `hostname`, `empName`,`dept`,`location`,`VLAN`,`Remarks`) VALUES (NULL,'$serialNum', '$modelNum', '$ipAddress', '$hostname',`$empName`,`$dept`,`$location`,`$VLAN`,`$Remarks`)";
    if ($conn->query($sql) === true) {
    header("Location: view_host.php");
    }
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>