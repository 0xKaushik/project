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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Header Section -->
  <header class="bg-info text-white py-3">
      <div class="container">
          <div class="d-flex justify-content-between align-items-center">
              <img src="logo.jpg" alt="Company Logo" class="img-fluid" style="max-width: 200px;">
              <h4 class="mb-auto">Host Management System</h4>
              <div>
                  <button id="logoutButton" class="btn btn-danger" onclick=logout()>Logout</button>
              </div>
          </div>
      </div>
  </header>

  <!-- Main Content Section -->
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <p>Welcome to your dashboard!</p>
                      <!-- Add your dashboard content here -->
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
