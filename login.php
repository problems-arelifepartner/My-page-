<?php
// login.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli('localhost', 'username', 'password', 'database_name');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Store the user information (for demonstration purposes, use hashing for passwords)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
