<?php

include_once "../navigation.php";
require_once "../connect.php";

$sup_list = $conn->query("SELECT * FROM supplier "); // object
$sup_data = $sup_list->fetch(PDO::FETCH_ASSOC);

?>
<html>

<head>
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
    <table border="1"  align="center" width="50%">

    <tr>
            <th>Supplier ID</th>
            <td><?php echo $sup_data['supplier_ID'] ?></td>
        </tr>

        <tr>
            <th>Supplier Name</th>
            <td><?php echo $sup_data['sup_name'] ?></td>
        </tr>
        
  
        <tr>
            <th>Address</th>
            <td><?php echo $sup_data['address'] ?></td>
        </tr>

        <tr>
            <th>Start Date</th>
            <td><?php echo $sup_data['start_date'] ?></td>
        </tr>
        
        
    </table>
</body>

</html>