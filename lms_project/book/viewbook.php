<?php
include_once "../navigation.php";
require_once "../connect.php";



if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
} else {
    $book_id = 0;
}
$supplierList = $conn->query("SELECT * FROM book Left JOIN supplier ON book.supplier_ID = supplier.supplier_id WHERE book_id=$book_id"); 
$supplierData = $supplierList->fetch(PDO::FETCH_ASSOC);
$bookList = $conn->query("SELECT * FROM book"); 
$bookData = $bookList->fetch(PDO::FETCH_ASSOC); 


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
            <th>Book ID</th>
            <td><?php echo $bookData['book_id'] ?></td>
        </tr>
        <tr>
            <th>Book Title</th>
            <td><?php echo $bookData['book_title'] ?></td>
        </tr>
        <tr>
            <th>Book Description</th>
            <td><?php echo $bookData['book_description'] ?></td>
        </tr>
        <tr>
            <th>Book Item</th>
            <td><?php echo $bookData['book_item'] ?></td>
        </tr>
        <tr>
            <th>Genre</th>
            <td><?php echo $bookData['genre'] ?></td>
        </tr>
        <tr>
            <th>Compensation</th>
            <td><?php echo $bookData['compensation'] ?></td>
        </tr>
        <tr>
            <th>Book Cover</th>
            <?php if (!empty($bookData['image'])) { ?>
                <td><img src="../upload/images/<?php echo $bookData['image'] ?>" width="90"></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>
            

        </tr>
        <tr>
            <th>ISBN</th>
            <td><?php echo $bookData['ISBN'] ?></td>
        </tr>
       
        <tr>
        <th>Supplier ID </th>
            <?php if (!empty($bookData['supplier_id'])) { ?>
                <td><?php echo $bookData['supplier_id'] ?></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>
        </tr>
    </table>
</body>

</html>
