<?php
include_once "../navigation.php";
 
require_once "../connect.php";

$bookList = $conn->query("SELECT * FROM book");
$bookData = $bookList->fetchAll(PDO::FETCH_ASSOC); 

?>

<html>

<head>
    <title> Books </title>
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

</head>

<body>
    <table border="1" bgcolor="#E6E6FA" width=50% align="center">
        <caption>Books</caption>
        <tr>
            <th>BookID</th>
            <th>Book Title</th>
            <th>Book Description</th>
            <th>Book Item</th>
            <th>Genre</th>
            <th>Compensation</th>
            <th>Image</th>
            <th>ISBN</th>
            <th>Supplier ID</th>
            <th>Extra</th>
            
        </tr>
            <tr>
            <?php foreach ($bookData as $book) {?>
                <td><?php echo $book['book_id'] ?></td>
                <td><?php echo $book['book_title'] ?></td>
                <td><?php echo $book['book_description'] ?></td>
                <td><?php echo $book['book_item'] ?></td>
                <td><?php echo $book['genre'] ?></td>
                <td><?php echo $book['compensation'] ?></td>
                <!-- <td><?php echo $book['image'] ?></td> -->
                <?php if ($book['image'] != "") { ?>
                    <td><img src="../upload/images/<?php echo $book['image'] ?>" width="90"></td>
                <?php } else { ?>
                    <td></td>
                <?php } ?>
                <td><?php echo $book['ISBN'] ?></td>
                <td><?php echo $book['supplier_id'] ?></td>
                
              
                
              
                <td>
                    <a href="viewbook.php?book_id=<?php echo $book['book_id'] ?>">View</a>
                    <a href="editbook.php?book_id=<?php echo $book['book_id'] ?>">Edit</a>
                    <a href="deletebook.php?book_id=<?php echo $book['book_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <!-- <center>
        <a href="addbook.php"> Add New Book </a>
    </center> -->
</body>

</html>