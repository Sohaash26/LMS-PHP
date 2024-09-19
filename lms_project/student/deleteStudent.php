<?php
session_start();
if (!isset($_SESSION['std_ID'])) {
    header("location: ../index.php");
}
require_once "../connect.php";
if (isset($_GET['std_ID'])) {
    $std_id = $_GET['std_ID'];
} else {
    $std_id = 0;
}
$result = $conn->query("DELETE FROM student WHERE std_ID=$std_id"); 
if ($result) {
    header("location: index.php");
}
?>