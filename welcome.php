<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - MR_DIABLO</title>
</head>
<body>
    <h1>Welcome to MR_DIABLO's Resource Library</h1>
    <p>You are successfully logged in!</p>
    <a href="logout.php">Logout</a>
</body>
</html>

