<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webappdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample username and password
$usernameValue = "test";
$passwordValue = "test";
$isAdmin = 1;  // Assuming isAdmin is a boolean (1 for true, 0 for false)

// Hash the password
$hashedPassword = password_hash($passwordValue, PASSWORD_DEFAULT);

// Store the username and hashed password in the database
echo "Username: $usernameValue, Hashed Password: $hashedPassword, isAdmin: $isAdmin";

$stmt = $conn->prepare("INSERT INTO accounts (username, password, isAdmin) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $usernameValue, $hashedPassword, $isAdmin);
$stmt->execute();

echo "User added";

$stmt->close();
$conn->close();
?>
