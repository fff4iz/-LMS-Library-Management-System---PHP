<?php
session_start(); // Start the session

// Destroy all session data
session_destroy();

// Redirect the user to the login page
header("Location: admin-login.php");
exit(); // Ensure no further code is executed after redirect
?>
