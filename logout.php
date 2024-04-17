<?php
session_start(); // Start the session

// Prevent going back after logout
echo "<script>window.history.forward();</script>";

// Destroy all session data
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit(); // Ensure no further code is executed after redirect
?>
