<?php
session_start();
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username, password, isAdmin FROM accounts WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $dbUsername, $dbPassword, $isAdmin);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $dbPassword)) {
            $_SESSION["userId"] = $userId;
            $_SESSION["username"] = $dbUsername;
            $_SESSION["isAdmin"] = $isAdmin;
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }

    $stmt->close();
}

$conn->close();
?>
