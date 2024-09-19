<?php
session_start();
if (!isset($_SESSION['supplier_ID'])) {
    header("location: ../index.php");
}
require_once "../connect.php";
if (isset($_GET['supplier_ID'])) {
    $supplier_ID = $_GET['supplier_ID'];
} else {
    $supplier_ID = 0;
}
$result = $conn->query("DELETE FROM supplier WHERE supplier_ID=$supplier_ID"); 
if ($result) {
    header("location: index.php");
}
?>