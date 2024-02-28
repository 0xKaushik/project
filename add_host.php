<?php
session_start();

if (!isset($_SESSION["userId"])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Host</title>

    <script src="jquery-3.7.1.js"></script>
    <script>
        var $j = jQuery.noConflict();
    </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between align-items-center">
        <img src="logo.jpg" alt="Company Logo" class="img-fluid" style="max-width: 200px; mix-blend-mode: multiply;">
        <h4 class="mb-auto">IT Inventory Management System</h4>
        <div class="d-flex justify-content-between ">
            <button id="addHostBtn" class="btn btn-danger" style="margin-right: 10px;" onclick=add_host()>Add Host</button>
            <button id="viewHostBtn" class="btn btn-danger" style="margin-right: 10px;" onclick=view_host()>View Host</button>
            <button id="logoutButton" class="btn btn-danger" style="margin-right: 10px;" onclick=logout()>Logout</button>   
    
    <a class="navbar-brand" href="dashboard.php">
        <i class="bi bi-house"></i>
    </a>
</nav>
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <h4>Add Host</h4>
                      <form action="add_host.php" method="POST" id="addHostForm">
                          <div class="form-group">
                              <label for="hostname">Hostname</label>
                              <input type="text" class="form-control" id="hostname" name="hostname" required>
                          </div>
                          <div class="form-group">
                              <label for="ipAddress">IP Address</label>
                              <input type="text" class="form-control" id="ipAddress" name="ipAddress" required>
                          </div>
                          <div class="form-group">
                              <label for="os">Operating System</label>
                              <input type="text" class="form-control" id="os" name="os" required>
                          </div>
                          <div class="form-group">
                              <label for="VLAN">VLAN</label>
                              <input type="text" class="form-control" id="VLAN" name="VLAN" required>
                          </div>
                          <button type="submit" class="btn btn-primary" >Add Host</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="script.js"></script>

</body>

</html>
<?php
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