<?php
session_start();
if (!isset($_SESSION['emp_ID'])) {
    header("location: ../index.php");
}
require_once "../connect.php";
if (isset($_GET['emp_ID'])) {
    $emp_id = $_GET['emp_ID'];
} else {
    $emp_id = 0;
}
$result = $conn->query("DELETE FROM employee WHERE emp_ID=$emp_id"); 
if ($result) {
    header("location: index.php");
}
?>
