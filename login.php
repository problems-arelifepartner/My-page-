<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "user_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username exists in the database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password (use password_hash() and password_verify() for real-world apps)
        if ($password === $row['password']) {
            // Set cookies for username and logged_in for 1 hour
            setcookie("username", $username, time() + 3600, "/");
            setcookie("logged_in", "true", time() + 3600, "/");

            $_SESSION["logged_in"] = true;
            header("Location: welcome.php");
            exit();
        } else {
            echo "<p>Invalid username or password. Please try again.</p>";
        }
    } else {
        echo "<p>Invalid username or password. Please try again.</p>";
    }
}

$conn->close();
?>
