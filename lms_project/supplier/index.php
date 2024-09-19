<?php
include_once "../navigation.php";
 
require_once "../connect.php";

$supList = $conn->query("SELECT * FROM supplier");
$supData = $supList->fetchAll(PDO::FETCH_ASSOC); 

?>

<html>

<head>
    <title> Suppliers </title>
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
    <table >
        <caption>Suppliers </caption>
        <tr>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Address</th>
            <th>Start Date</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
            <!-- border="1" bgcolor="#E6E6FA" width=50% align="center" -->
        </tr>
            <tr>
            <?php foreach ($supData as $sup) {?>
                <td><?php echo $sup['supplier_ID'] ?></td>
                <td><?php echo $sup['sup_name'] ?></td>
                <td><?php echo $sup['address'] ?></td>
                <td><?php echo $sup['start_date'] ?></td>
 
                
                
                
              <td> <a href="viewsupplier.php?supplier_ID=<?php echo $sup['supplier_ID'] ?>">View</a></td>
              <td> <a href="editsupplier.php?supplier_ID=<?php echo $sup['supplier_ID'] ?>">Edit</a></td>
              <td> <a href="deletesupplier.php?supplier_ID=<?php echo $sup['supplier_ID'] ?>">Delete</a></td>
               
            </tr>
        <?php } ?>
    </table>
    <center>
        <a href="addsupplier.php"> Add New Supplier </a>
    </center>
</body>

</html>