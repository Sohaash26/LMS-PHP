<?php

// session_start();
// if (!isset($_SESSION['emp_ID'])) {
//     header("location: ../index.php");
// }

include_once "../navigation.php";

require_once "../connect.php";


if (isset($_POST['std_id'])) {
    $std_id = $_POST['std_id'];
} else {
    $std_id = 0;
}
$studentList = $conn->query("SELECT * FROM student "); 
$studentData = $studentList->fetch(PDO::FETCH_ASSOC);  


?>

<html>

<head>
<title>Student: View Students</title>
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
        <caption style ="color: white;" style="font-size:100px;" >Students</caption>
    
            <tr>
            <th>ID: </th>
            <td><?php echo $studentData['std_ID'] ?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><?php echo $studentData['std_name'] ?></td>
        </tr>
        <tr>
            <th>Academic Year:</th>
            <td><?php echo $studentData['std_year'] ?></td>
        </tr>
        <tr>
            <th>Faculty</th>
            <td><?php echo $studentData['std_faculty'] ?></td>
        </tr>
        <tr>
            <th>DOB</th>
            <td><?php echo $studentData['std_DOB'] ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $studentData['std_address'] ?></td>
        </tr>
      
               
                   
                
            </tr>
            
        
    </table>
   
</body>

</html>