<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Book</title>
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

        /*view book css*/
        /* Container styles */
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
        }

        /* Table styles */
        .table-viewbook {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        /* Table header styles */
        .table-title th {
            padding: 10px;
            text-align: left;
            background-color: #f8f9fa; /* Header background color */
            border-bottom: 2px solid #dee2e6; /* Bottom border */
        }

        /* Table body cell styles */
        .table-viewbook td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6; /* Bottom border */
        }

        /* Alternating row colors */
        .table-viewbook tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Even row background color */
        }

        /* Hover effect */
        .table-viewbook tbody tr:hover {
            background-color: #e2e2e2; /* Hover background color */
        }

        /* Button styles */
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        /* Primary button style */
        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        /* Secondary button style */
        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
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
        <h2> &nbsp &nbsp Library Management System</h2>
        <nav class="navigation">
            <a href="dashboard.php" class="active">Dashboard</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="list-book.php">List Book</a>
            <a href="new-book.php">New Book</a>
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
    
    <div class="container">
        <table class="table-viewbook">
            <thead class="table-title">
                <tr>    
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">AUTHOR </th>
                    <th scope="col">GENRE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col" colspan="2" class="text-center">FUNCTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "db.php";

                if (isset($_GET['book_id'])) {
                    $bookid = $_GET['book_id'];

                    $query = "SELECT * FROM books WHERE id = {$bookid}";
                    $view_book = mysqli_query($mysqli,$query);

                    while($row = mysqli_fetch_assoc($view_book))
                    {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>{$row['author']}</td>";
                        echo "<td>{$row['genre']}</td>";
                        echo "<td>{$row['status']}</td>";
                        // Add buttons for borrowing and returning books
                        echo "<td><a href='borrow-book.php?book_id={$row['id']}' class='btn btn-primary'>Borrow</a></td>";
                        echo "<td><a href='return-book.php?book_id={$row['id']}' class='btn btn-secondary'>Return</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
