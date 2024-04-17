<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Delete Book</title>
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

    <?php
    require "db.php";

    if (isset($_GET['delete'])) {
        $bookid = $_GET['delete'];

        $query = "DELETE FROM books WHERE id = {$bookid}";
        $delete_query = mysqli_query($mysqli, $query);
        
        if ($delete_query) {
            echo '<script>
                alert("Book deleted successfully!");
                window.location.href = "admin-list-book.php";
                </script>';
        } else {
            echo '<script>
                alert("Failed to delete book!");
                window.location.href = "admin-list-book.php";
                </script>';
        }
    }
    ?>

</body>
</html>