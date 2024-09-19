<?php

// session_start();
// if (!isset($_SESSION['emp_ID'])) {
//     header("location: ../index.php");
// }

include_once "../navigation.php";

require_once "../connect.php";


if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
} else {
    $emp_id = 0;
}
$employeeList = $conn->query("SELECT * FROM employee "); 
$employeeData = $employeeList->fetch(PDO::FETCH_ASSOC);  


?>

<html>

<head>
<title>Employee: View Employees</title>
<link rel="stylesheet" href="./style.css">
</head>
<style>
        table tr th {
            width: 30%;
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }
    </style>


<body>
    <table border="1" bgcolor="white" width=50% align="center">
        <caption style ="color: white;" style="font-size:100px;" >Employees</caption>
    
            <tr>
            <th>ID: </th>
            <td><?php echo $employeeData['emp_ID'] ?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><?php echo $employeeData['emp_name'] ?></td>
        </tr>
        <tr>
            <th>Hire Date:</th>
            <td><?php echo $employeeData['hire_date'] ?></td>
        </tr>
        <tr>
            <th>DOB</th>
            <td><?php echo $employeeData['DOB'] ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $employeeData['address'] ?></td>
        </tr>
        <tr>
            <th>Salary</th>
            <td><?php echo $employeeData['salary'] ?></td>
        </tr>
               
                   
                
            </tr>
            
        
    </table>
   
</body>

</html>