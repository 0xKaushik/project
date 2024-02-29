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
$category = isset($_POST["category"]) ? filter_var(trim($_POST["category"]), FILTER_SANITIZE_STRING) : '';
if (empty($category)) {
    die("Category is required");
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
if (isset($_POST['atid'])) {
    $ATID = filter_var(trim($_POST["atid"]), FILTER_SANITIZE_STRING);
    if (empty($ATID)) {
        die("ATID is required");
    }
} else {
    die("ATID is not set in the form submission");
}

if (isset($_POST['remarks'])) {
    $remarks = filter_var(trim($_POST["remarks"]), FILTER_SANITIZE_STRING);
    if (empty($remarks)) {
        die("Remarks are required");
    }
} else {
    die("Remarks are not set in the form submission");
}

$sql = "INSERT INTO `host_info` (`serialNum`, `modelNum`, `ipAddress`, `ATID`, `hostname`,`category`, `empName`, `dept`, `Location`, `VLAN`, `Remarks`) VALUES ('{$serialNum}', '{$modelNum}', '{$ipAddress}', '{$ATID}', '{$hostname}', '{$category}','{$empName}', '{$dept}', '{$location}', '{$VLAN}', '{$remarks}')";
    if ($conn->query($sql) === true) {
    header("Location: view_host.php");
    }
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>