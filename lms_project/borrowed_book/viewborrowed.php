<?php
include_once "../navigation.php";
require_once "../connect.php";



if (isset($_GET['borrowed_id'])) {
    $book_id = $_GET['borrowed_id'];
} else {
    $book_id = 0;
}
// $supplierList = $conn->query("SELECT * FROM book Left JOIN supplier ON book.supplier_ID = supplier.supplier_id WHERE book_id=$book_id"); 
// $supplierData = $supplierList->fetch(PDO::FETCH_ASSOC);
// $bookList = $conn->query("SELECT * FROM book"); 
// $bookData = $bookList->fetch(PDO::FETCH_ASSOC); 
$studentList = $conn->query("SELECT std_ID, std_name FROM student"); 
$studentData = $studentList->fetch(PDO::FETCH_ASSOC);
$bookList = $conn->query("SELECT book_id FROM book"); 
$bookData = $bookList->fetch(PDO::FETCH_ASSOC); 
$empList = $conn->query("SELECT emp_ID, emp_name FROM employee"); 
$empData = $empList->fetch(PDO::FETCH_ASSOC); 
$borrowedList = $conn->query("SELECT * FROM borrowed_book"); 
$borrowedData = $borrowedList->fetch(PDO::FETCH_ASSOC);


?>

<html>

<head>
<title>Book: View Books</title>
<link rel="stylesheet" href="./style.css">
<style>
        table tr th {
            width: 30%;
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>


<body>
    <table border="1" bgcolor="lightgray" align="center" width="50%">
    <caption style ="color: white;" style="font-size:100px;" >Book</caption>
    <tr>
            <th>Student ID</th>
            <?php if (!empty($studentData['std_ID'])) { ?>
                <td><?php echo $studentData['std_ID']. " - " . $studentData['std_name'] ?></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>
    </tr>
        <tr>
            <th>Book ID</th>
            <?php if (!empty($bookData['book_id'])) { ?>
                <td><?php echo $bookData['book_id'] ?></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>
        </tr>
        <tr>
            <th>Borrowed ID</th>
            <td><?php echo $borrowedData['borrowed_id'] ?></td>
        </tr>
        <tr>
            <th>Date Borrowed</th>
            <td><?php echo $borrowedData['date_borrowed'] ?></td>
        </tr>
        <tr>
            <th>Return Date</th>
            <td><?php echo $borrowedData['return_date'] ?></td>
        </tr>
        
       
        <tr>
        <th>Employee ID </th>
            <?php if (!empty($empData['emp_ID'])) { ?>
                <td><?php echo $empData['emp_ID'] . " - " . $empData['emp_name']?></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>
        </tr>
    </table>
</body>

</html>
