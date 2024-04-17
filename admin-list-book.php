<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - List Book</title>

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

        /* Container styles */
        .container {
            margin: 20px auto;
            width: 80%;
        }

        /* Heading styles */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Table styles */
        .table-listbook {
            width: 100%;
            border-collapse: collapse;
        }

        /* Table header styles */
        .table-title {
            background-color: #f8f9fa;
        }

        /* Table header cell styles */
        .table-title th {
            padding: 10px;
            text-align: left;
        }

        /* Table body cell styles */
        .table-listbook td {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        /* Center align text in the "CRUD Operations" column */
        .table-listbook .text-center {
            text-align: center;
        }

        .table-listbook a {
            text-decoration: none;
        }

        .table-listbook a:hover {
            background-color: black;
            color: white;
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

        /* Danger button style */
        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /* Search bar styles */
        .search-container {
            margin-bottom: 20px;
        }

        #searchInput {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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

    <div class="container">
        <h1>List of Book</h1>
        <!-- Search input field -->
        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchBooks()" placeholder="Search by book title...">
        </div>
        <table class="table-listbook">
            <thead class="table-title">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">AUTHOR </th>
                    <th scope="col">GENRE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col" colspan="3" class="text-center">CRUD Operations</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require "db.php";

                    $query = "  SELECT * FROM books";
                    $view_books = mysqli_query($mysqli,$query);

                    while($row= mysqli_fetch_assoc($view_books)){
                        $id = htmlspecialchars($row['id']);
                        $title = htmlspecialchars($row['title']);
                        $author = htmlspecialchars($row['author']);
                        $genre = htmlspecialchars($row['genre']);
                        $status = htmlspecialchars($row['status']);

                        echo " <tr>";
                        echo " <th scope='row'>{$id}</th>";
                        echo " <td> {$title} </td>";
                        echo " <td> {$author} </td>";
                        echo " <td> {$genre} </td>";
                        echo " <td> {$status} </td>";
                        echo " <td class='text-center'> <a href='admin-view-book.php?book_id={$id}' class='btn btn-primary'>      View</a> </td>";
                        echo " <td class='text-center'> <a href='admin-update-book.php?book_id={$id}' class='btn btn-secondary'>  EDIT</a> </td>";
                        echo " <td class='text-center'> <a href='admin-delete-book.php?delete={$id}' class='btn btn-danger'>     DELETE</a> </td>";
                        echo " </tr>";
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function searchBooks() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table-listbook"); // Change to querySelector
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Change index to match title column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>
</html>