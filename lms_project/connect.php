<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=lms_project", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
