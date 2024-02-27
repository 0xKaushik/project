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
    <title>Dashboard</title>

    <script src="jquery-3.7.1.js"></script>
    <script>
        var $j = jQuery.noConflict();
    </script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between align-items-center">
        <img src="logo.jpg" alt="Company Logo" class="img-fluid" style="max-width: 200px;">
        <h4 class="mb-auto">IT Inventory Management System</h4>
        <div>
                <button id="addHostBtn" class="btn btn-danger" onclick=add_host()>Add Host</button>
                <button id="viewHostBtn" class="btn btn-danger" onclick=view_host()>View Host</button>
                <button id="logoutButton" class="btn btn-danger" onclick=logout()>Logout</button>   
        </div>
        <a class="navbar-brand" href="dashboard.php">
            <i class="bi bi-house"></i>
        </a>
    </nav>



  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <h4>Host Information</h4>
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Hostname</th>
                                  <th>IP Address</th>
                                  <th>Operating System</th>
                                  <th>VLAN</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              require "db_connect.php";
                              $sql = "SELECT id, hostname, ip_address, os ,VLAN FROM host_info";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      echo "<tr>";
                                      echo "<td>" . $row["id"] . "</td>";
                                      echo "<td>" . $row["hostname"] . "</td>";
                                      echo "<td>" . $row["ip_address"] . "</td>";
                                      echo "<td>" . $row["os"] . "</td>";
                                      echo "<td>" . $row["VLAN"] . "</td>";
                                      echo "</tr>";
                                  }
                              } else {
                                  echo "<tr><td colspan='5'>No hosts found</td></tr>";
                              }
                              $conn->close();
                              ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</body>

</html>
