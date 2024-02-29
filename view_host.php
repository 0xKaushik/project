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
        <img src="logo.jpg" alt="Company Logo" class="img-fluid" style="max-width: 200px; mix-blend-mode: multiply;">
        <h4 class="mb-auto text-center">IT Asset Management System</h4>
        <div class="d-flex justify-content-between ">
            <button id="addHostBtn" class="btn btn-danger" style="margin-right: 10px;" onclick=add_host()>Add Host</button>
            <button id="logoutButton" class="btn btn-danger" style="margin-right: 10px;" onclick=logout()>Logout</button>   
    
    <a class="navbar-brand" href="dashboard.php">
        <i class="bi bi-house"></i>
    </a>
</nav>


  <div class="container-fluid mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <h4 class="text-center">Host Information</h4>
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                    <th>Serial Number</th>
                                    <th>Model Number</th>
                                    <th>IP Address</th>
                                    <th>ATID</th>
                                    <th>Hostname</th>
                                    <th>Category</th>
                                    <th>Employee Name</th>
                                    <th>Department</th>
                                    <th>Location</th>
                                    <th>VLAN</th>
                                    <th>Remarks</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              require "db_connect.php";
                              $sql = "SELECT `serialNum`, `modelNum`, `ipAddress`, `ATID`, `hostname`,`category`, `empName`, `dept`, `Location`, `VLAN`, `Remarks` FROM host_info";
                              $result = $conn->query($sql);
                              if ($result !== false && $result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      echo "<tr>";
                                    echo "<td>" . $row["serialNum"] . "</td>";
                                    echo "<td>" . $row["modelNum"] . "</td>";
                                    echo "<td>" . $row["ipAddress"] . "</td>";
                                    echo "<td>" . $row["ATID"] . "</td>";
                                    echo "<td>" . $row["hostname"] . "</td>";
                                    echo "<td>" . $row["category"] . "</td>";
                                    echo "<td>" . $row["empName"] . "</td>";
                                    echo "<td>" . $row["dept"] . "</td>";
                                    echo "<td>" . $row["Location"] . "</td>";
                                    echo "<td>" . $row["VLAN"] . "</td>";
                                    echo "<td>" . $row["Remarks"] . "</td>";
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
