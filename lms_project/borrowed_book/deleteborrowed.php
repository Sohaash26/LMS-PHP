<?php

session_start();
if (!isset($_SESSION['borrowed_id'])) {
    header("location: ../index.php");
}
require_once "../connect.php";
if (isset($_GET['borrowed_id'])) {
    $borrowed_id = $_GET['borrowed_id'];
} else {
    $borrowed_id = 0;
}
$result = $conn->query("DELETE FROM borrowed_book WHERE borrowed_id=$borrowed_id"); 
if ($result) {
    header("location: index.php");
}
?>