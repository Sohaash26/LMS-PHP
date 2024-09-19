<?php

session_start();
if (!isset($_SESSION['book_id'])) {
    header("location: ../index.php");
}
require_once "../connect.php";
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
} else {
    $book_id = 0;
}
$result = $conn->query("DELETE FROM book WHERE book_id=$book_id"); 
if ($result) {
    header("location: index.php");
}
?>
