<?php

// session_start();
// if (!isset($_SESSION['emp_ID'])) {
//     header("location: ../index.php");
// }

include_once "../navigation.php";

require_once "../connect.php";

$studentList = $conn->query("SELECT * FROM student "); 
$studentData = $studentList->fetchAll(PDO::FETCH_ASSOC);  

?>

<html>

<head>
<title>Students</title>
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
    <table>
        <caption style ="color: white;" style="font-size:100px;" >Students</caption>

       
        <tr>
        
            <th> ID: </th>
            <th>Name:</th>
            <th>Acdemic Year:</th>
            <th>Faculty:</th>
            <th>DOB:</th>
            <th>Address:</th>
            <th>Extra:</th>
           
        </tr>
    
            <tr>
            <?php foreach ($studentData as $student) {?>
                <td><?php echo $student['std_ID'] ?></td>
                <td><?php echo $student['std_name'] ?></td>
                <td><?php echo $student['std_year'] ?></td>
                <td><?php echo $student['std_faculty'] ?></td>
                <td><?php echo $student['std_DOB'] ?></td>
                <td><?php echo $student['std_address'] ?></td>
               
                <td>
                    
                    <a href="viewStudent.php?std_ID=<?php echo $student['std_ID'] ?>"> View  </a>
                    <a href="editStudent.php?std_ID=<?php echo $student['std_ID'] ?>">Edit </a>
                    <a href="deleteStudent.php?std_ID=<?php echo $student['std_ID'] ?>">Delete </a>
                </td>
            </tr>
        <?php }?>
    </table>
    <center>
        <a href="addStudent.php">Add New Student</a>
    </center>
</body>

</html>