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
        <h4 class="mb-auto">IT Asset Management System</h4>
        <div class="d-flex justify-content-between align-items-center ">
                <button id="addHostBtn" class="btn btn-danger" style="margin-right: 10px;" onclick=add_host()>Add Host</button>
                <button id="viewHostBtn" class="btn btn-danger" style="margin-right: 10px;" onclick=view_host()>View Host</button>
                <button id="logoutButton" class="btn btn-danger" style="margin-right: 10px;" onclick=logout()>Logout</button>   
        
        <a class="navbar-brand" href="dashboard.php">
            <i class="bi bi-house"></i>
        </a>
    </nav>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
