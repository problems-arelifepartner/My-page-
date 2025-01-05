<?php
// Clear cookies and session
setcookie("username", "", time() - 3600, "/");
setcookie("logged_in", "", time() - 3600, "/");

session_start();
session_unset();
session_destroy();

header("Location: login.html");
exit();
?>
