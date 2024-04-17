<?php
require "db.php";

if (isset($_GET['book_id'])) {
    $bookid = $_GET['book_id'];

    // Update the status of the book to 'available'
    $query = "UPDATE books SET status = 'AVAILABLE' WHERE id = {$bookid}";
    mysqli_query($mysqli, $query);

    // Redirect back to the view book page
    header("Location: view-book.php?book_id={$bookid}");
    exit();
}
?>
