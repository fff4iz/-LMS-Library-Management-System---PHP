<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function capitalizeInput(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
</head>
<body>
    <header>
        <h2>Libary Management System</h2>
        <nav class="navigation">
            <a href="index.html">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>

    <div class="form-box-login-register">

    <?php
    require "db.php";

    function showAlert($message) {
        echo "<script>alert('$message');</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fn = htmlspecialchars($_POST["fullname"]);
        $un = htmlspecialchars($_POST["username"]);
        $em = htmlspecialchars($_POST["email"]);
        // Password should not be outputted anywhere, so no encoding is needed for it.
        $pw = $_POST["password"];
        $confirm_pw = $_POST["confirm_password"];

        if ($pw !== $confirm_pw) {
            showAlert("Error: Passwords do not match.");
        } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/', $pw)) {
            showAlert("Error: Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one symbol.");
        } else {
            // Prepare and bind the SQL statement
            $check_username_query = "SELECT * FROM user WHERE username=?";
            $check_username_stmt = $mysqli->prepare($check_username_query);
            $check_username_stmt->bind_param("s", $un);
            $check_username_stmt->execute();
            $check_username_result = $check_username_stmt->get_result();

            if ($check_username_result->num_rows > 0) {
                showAlert("Error: Username already taken.");
            } else {
                $check_email_query = "SELECT * FROM user WHERE email=?";
                $check_email_stmt = $mysqli->prepare($check_email_query);
                $check_email_stmt->bind_param("s", $em);
                $check_email_stmt->execute();
                $check_email_result = $check_email_stmt->get_result();

                if ($check_email_result->num_rows > 0) {
                    showAlert("Error: Email already registered.");
                } else {
                    // Prepare and bind the SQL statement for insertion
                    $insert_query = "INSERT INTO user (fullname, username, email, password) VALUES (?, ?, ?, ?)";
                    $insert_stmt = $mysqli->prepare($insert_query);
                    $insert_stmt->bind_param("ssss", $fn, $un, $em, $pw);
                    
                    if ($insert_stmt->execute()) {
                        showAlert("New user registered successfully!");
                    } else {
                        showAlert("Error: " . $insert_stmt->error);
                    }
                }
            }
        }
    }

    $mysqli->close();
    ?>
        <h3>Registration Form</h3>
        <form action="register.php" method="post">
            <div class="input-box">
                <input type="text" name="fullname" oninput="capitalizeInput(this)" required placeholder="FULL NAME">
            </div>
            <div class="input-box">
                <input type="text" name="username" required placeholder="USER NAME">
            </div>
            <div class="input-box">
                <input type="email" name="email" required placeholder="EMAIL">
            </div>
            <div class="input-box">
                <input type="password" name="password" required placeholder="PASSWORD">
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" required placeholder="CONFIRM PASSWORD">
            </div>
            <div class="input-box">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>
