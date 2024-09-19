<?php
include_once "../navigation.php";
 
require_once "../connect.php";

$bookList = $conn->query("SELECT * FROM borrowed_book");
$bookData = $bookList->fetchAll(PDO::FETCH_ASSOC); 

?>

<html>

<head>
    <title> Borrowed Books </title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #B0C4DE;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #B0C4DE;
}
</style>
<link rel="stylesheet" href="./style.css">

<!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=2">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->


</head>

<body>
    
    <table >
        <caption>Borrowed Books </caption>
        <tr>
            <th>Student ID</th>
            <th>Book ID</th>
            <th>Borrowed ID</th>
            <th>Date Borrowed</th>
            <th>Return Date</th>
            <th>Employee ID</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
            <tr>
            <?php foreach ($bookData as $book) {?>
                <td><?php echo $book['std_id'] ?></td>
                <td><?php echo $book['book_id'] ?></td>
                <td><?php echo $book['borrowed_id'] ?></td>
                <td><?php echo $book['date_borrowed'] ?></td>
                <td><?php echo $book['return_date'] ?></td>
                <td><?php echo $book['emp_id_fk'] ?></td>
                
                
                
              
                <td> <a href="viewborrowed.php?borrowed_id=<?php echo $book['borrowed_id'] ?>"><button type="button" class="btn btn-success">View</a></td>
              <td> <a href="editborrowed.php?borrowed_id=<?php echo $book['borrowed_id'] ?>"><button type="button" class="btn btn-info">Edit</a></td>
              <td> <a href="deleteborrowed.php?borrowed_id=<?php echo $book['borrowed_id'] ?>"><button type="button" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
    <center>
        <a href="addborrowed.php"> Add New Book </a>
    </center>
</body>

</html>