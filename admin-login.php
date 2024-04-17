<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Library System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>LMS Admin</h2>
        <nav class="navigation">
            <a href="index.html">Home</a> | 
            <a href="admin-login.php">Admin Login</a> <!-- Changed link to admin-login.php -->
        </nav>
    </header>

    <div class="form-box-login-register">
        <?php
        session_start(); // Start the session

        // Step 1: Set up the connection to the database
        require "db.php";

        // Step 2: Validate the admin login credentials
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $un = $_POST["username"];
            $pw = $_POST["password"];

            // Check if the admin username and password match records in the database
            $sql = "SELECT * FROM admin WHERE admin_username='$un' AND admin_password='$pw'";
            $result = $mysqli->query($sql);

            if ($result->num_rows == 1) {
                // If the user is found, set session variables and log the successful login attempt
                $_SESSION['username'] = $un;
                $currentDateTime = date('Y-m-d H:i:s');
                error_log("$currentDateTime - Successful login attempt for admin: $un".PHP_EOL, 3, "success_logfile.log");
                header("Location: admin-dashboard.php");
                exit();
            } else {
                // If the user is not found, display an error message and log the failed login attempt
                $currentDateTime = date('Y-m-d H:i:s');
                error_log("$currentDateTime - Failed login attempt for admin: $un".PHP_EOL, 3, "error_log.log");
                echo "<script>alert('Invalid username or password. Please try again.');</script>";
            }
        }
        $mysqli->close();
        ?>

        <h3>Admin Login</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-box">
                <input type="text" name="username" required placeholder="USER NAME">
            </div>
            <div class="input-box">
                <input type="password" name="password" required placeholder="PASSWORD">
            </div>
            <div class="input-box">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>

    <?php
    // Custom error handling for PHP errors
    function customError($errno, $errstr) {
        error_log("Error: [$errno] $errstr", 3, "error_log.log");
        echo "<div class='error-box'><h3>Error: $errno - $errstr</h3></div>";
    }
    set_error_handler("customError", E_ALL);
    ?>
</body>
</html>
