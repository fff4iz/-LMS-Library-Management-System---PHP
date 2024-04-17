<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - New Book</title>
    <link rel="stylesheet" href="style.css">

    <style>
        /* CSS styles for the side navigation menu */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #334;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        /* Input menu styles */
        .input-menu {
            width: 100%;
            margin-bottom: 1rem;
            position: relative;
        }

        .input-menu select {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            color: #333;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .input-menu select:focus {
            border-color: #333;
        }

        .input-menu label {
            position: absolute;
            left: 1rem;
            top: -0.5rem;
            color: #aaa;
            font-size: 0.8rem;
            transition: transform 0.2s ease;
        }

        .input-menu select:focus + label,
        .input-menu select:valid + label {
            transform: translateY(-20px);
            color: #333;
        }

    </style>

    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
    <script>
        function capitalizeInput(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
</head>
<body>
    <header>
        <div class="menu-btn">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
        <h2> &nbsp &nbsp LMS Admin</h2>
        <nav class="navigation">
            <a href="admin-dashboard.php" class="active">Dashboard</a>
            <a href="admin-logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="admin-list-user.php">List User</a>
            <a href="admin-list-book.php">List Book</a>
            <a href="admin-new-book.php">New Book</a>
        </div>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
            }
        </script>
    </main>

    <div class="form-box-login-register">

    <?php
    // Step 1: Set up the connection to the database
    require "db.php";

    // Check if the connection is successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Define a function to create JavaScript alert
    function showAlert($message) {
        echo "<script>alert('$message');</script>";
    }

    // Step 2: Validate the form data and insert into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data and sanitize inputs
        $title = htmlspecialchars($_POST["title"]);
        $author = htmlspecialchars($_POST["author"]);
        $genre = htmlspecialchars($_POST["genre"]);

        // Step 3: Insert the form data into the database using prepared statements
        $sql = "INSERT INTO books (title, author, genre) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        
        // Check if the statement is prepared successfully
        if ($stmt === false) {
            showAlert("Error: Unable to prepare statement.");
        } else {
            // Bind parameters
            $stmt->bind_param("sss", $title, $author, $genre);

            // Execute the statement
            if ($stmt->execute()) {
                showAlert("New book registered successfully!");
            } else {
                showAlert("Error: Unable to register book.");
            }

            // Close the statement
            $stmt->close();
        }
    }

    // Close the connection
    $mysqli->close();
    ?>


        <h3>Add New Book Form</h3>
        <form action="admin-new-book.php" method="post">
            <div class="input-box">
                <input type="text" name="title" oninput="capitalizeInput(this)" required placeholder="BOOK TITLE">
            </div>
            <div class="input-box">
                <input type="text" name="author" oninput="capitalizeInput(this)" required placeholder="BOOK AUTHOR">
            </div>
            <div class="input-menu">
                <select name="genre" required>
                    <option value="" disabled selected>SELECT GENRE</option>
                    <option value="FICTION">FICTION</option>
                    <option value="NON-FICTION">NON-FICTION</option>
                    <option value="MYSTERY">MYSTERY</option>
                    <option value="FANTASY">FANTASY</option>
                    <option value="HORROR">HORROR</option>
                    <option value="ROMANCE">ROMANCE</option>
                    <option value="SLICE OF LIFE">SLICE OF LIFE</option>
                    <option value="HISTORICAL">HISTORICAL</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="input-box">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
    
</body>
</html>