<?php
session_start();

// Define your credentials (for simplicity, using hardcoded values)
$valid_username = "admin";
$valid_password = "password123"; // In a real-world scenario, use hashed passwords

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username and password match
    if ($username === $valid_username && $password === $valid_password) {
        // Set cookies for username and password for 1 hour
        setcookie("username", $username, time() + 3600, "/"); // 1 hour expiry
        setcookie("logged_in", "true", time() + 3600, "/");

        $_SESSION["logged_in"] = true;
        header("Location: welcome.php");
        exit();
    } else {
        echo "<p>Invalid username or password. Please try again.</p>";
    }
}
?>
