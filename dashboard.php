<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
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
        <h1 class = "headline">WELCOME TO THE LABRARY MANAGEMENT SYSTEM</h1>
        <p class = "para">
            The Library Management System (LMS) is a comprehensive software solution designed to streamline the management of library resources effectively. 
            With the LMS, users can seamlessly handle various tasks, including viewing, creating, reading, updating, and deleting books.
        </p>
        
        <p class = "para">
            This intuitive system provides users with easy access to the library's extensive collection of books. 
            Through a user-friendly interface, patrons can effortlessly search for books by title, author, genre, or any other relevant criteria. 
            Upon locating the desired book, users can view detailed information such as the title, author, genre.
        </p>

        <p class = "para">
            Additionally, the LMS empowers librarians and administrators to maintain the library's catalog efficiently. 
            Librarians can easily add new books to the system, ensuring that the collection remains up-to-date. 
            They can also edit existing book records to correct any inaccuracies or update information as needed.
        </p>

        <p class = "para">
            Furthermore, the LMS facilitates the seamless management of book inventory. 
            Librarians can monitor book availability, track borrowing history, and handle book returns effortlessly. 
            In case a book is no longer part of the collection or needs to be replaced, librarians can easily delete outdated records from the system.
        </p>

        <p class = "para">
            Overall, the Library Management System serves as a valuable tool for both library staff and patrons, enhancing the accessibility and organization of library resources. 
            By providing robust functionality for viewing, creating, reading, updating, and deleting books, the LMS ensures a smooth and efficient library experience for all users.
        </p>
    </div>

    <footer>
        <!-- Footer content if needed -->
    </footer>
</body>
</html>
