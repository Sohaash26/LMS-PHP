<?php

// session_start();
// if (!isset($_SESSION['emp_ID'])) {
//     header("location: ../index.php");
// }

include_once "../navigation.php";

require_once "../connect.php";

$employeeList = $conn->query("SELECT * FROM employee "); 
$employeeData = $employeeList->fetchAll(PDO::FETCH_ASSOC);  

?>

<html>

<head>
<title>Employees</title>
<link rel="stylesheet" href="./style.css">
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
        <caption style ="color: white;" style="font-size:100px;" >Employees</caption>

       
        <tr>
        
            <th> ID: </th>
            <th>Name:</th>
            <th>Hire Date:</th>
            <th>DOB:</th>
            <th>Address:</th>
            <th>Salary:</th>
            <th>Department Name:</th>
            <th> Extra: </th>
        </tr>
    
            <tr>
            <?php foreach ($employeeData as $employee) {?>
                <td><?php echo $employee['emp_ID'] ?></td>
                <td><?php echo $employee['emp_name'] ?></td>
                <td><?php echo $employee['hire_date'] ?></td>
                <td><?php echo $employee['DOB'] ?></td>
                <td><?php echo $employee['address'] ?></td>
                <td><?php echo $employee['salary'] ?></td>
                <td><?php echo $employee['dept_name'] ?></td>
                <td>
                    
                    <a href="viewEmp.php?emp_ID=<?php echo $employee['emp_ID'] ?>"> View  </a>
                    <a href="editEmp.php?emp_ID=<?php echo $employee['emp_ID'] ?>">Edit </a>
                    <a href="deleteEmp.php?emp_ID=<?php echo $employee['emp_ID'] ?>">Delete </a>
                </td>
            </tr>
        <?php }?>
    </table>
    <center>
        <a href="addEmp.php">Add New Employee</a>
    </center>
</body>

</html>