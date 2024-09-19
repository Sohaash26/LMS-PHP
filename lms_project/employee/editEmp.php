<?php
include_once "../navigation.php";
require_once "../connect.php";
if (isset($_GET['emp_ID'])) {
    $emp_ID = $_GET['emp_ID'];
} else {
    $emp_ID = 0;
}

// $allemployeeList = $conn->query("SELECT * FROM employee "); 
// $allemployeeData = $employeeList->fetchAll(PDO::FETCH_ASSOC); 

$empList = $conn->query("SELECT * FROM employee WHERE emp_ID=$emp_ID"); //object
$empData = $empList->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $new_emp_ID = validate($_POST['emp_ID']);
    $emp_name = validate($_POST['emp_name']);
    $password = validate(sha1($_POST['password']));
    $hire_date = validate($_POST['hire_date']);
    $salary = validate($_POST['salary']);
    $address = validate($_POST['address']);
    $DOB = validate($_POST['DOB']);
    $dept_name = validate($_POST['dept_name']);



    if (!empty($new_emp_ID) && !empty($emp_name) && !empty($password) && !empty($hire_date) && !empty($salary) && !empty($address) && !empty($DOB) && !empty($dept_name)) 
    {
        $stmt = "UPDATE `employee` SET `emp_ID`='$new_emp_ID',`emp_name`=' $emp_name',`password`='$password',`hire_date`='$hire_date',`salary`='$salary ',`address`=' $address',`DOB`='$DOB',`dept_name`='$dept_name' WHERE emp_ID=$emp_ID ";
        
        $result = $conn->query($stmt);

            echo '<script>alert("Employee Updated Successfully!")</script>';
        }
        else{
            echo '<script>alert("Failed To Update!")</script>';
        }

}


?>
<html>

<head>
<title>Employee: Edit Employee</title>
</head>

<body>
    <center>
        <form method="post" enctype="multipart/form-data" action="editEmp.php?emp_ID=<?php echo $emp_ID ?>">

                <div> 
                ID: <input type="number" name="emp_ID" value="<?php echo $empData['emp_ID']; ?>"required><br><br>
                </div>
            
           
                <div>
                Name:   <input type="text" name="emp_name" value="<?php echo $empData['emp_name']; ?>" required><br><br>
                </div>
           
            
                
                <div>
                Password: <input type="password" name="password" value="<?php echo $empData['password']; ?>" required><br><br>
                </div>
            
    
                <div>
                Hire Date:  <input type="date" name="hire_date" value="<?php echo $empData['hire_date']; ?>" required><br><br>
                </div>
            
            
                <div>
                Salary:  <input type="number" name="salary"value="<?php echo $empData['salary']; ?>" required><br><br>
                </div>
            
           
                <div>
                Address:  <input type="text" name="address" value="<?php echo $empData['address']; ?>" required><br><br>
                </div>
            
           
            
                <div>
                DOB:  <input type="date" name="DOB" value="<?php echo $empData['DOB']; ?>" required><br><br>
                </div>
            
          
                <div>
                Department Name:  <input type="text" name="dept_name" value="<?php echo $empData['dept_name']; ?>"><br><br>
                </div>
            
           
            <div>
                <input type="submit" name="submit" value="Edit">
            </div>
            
            
        </form>
    </center>
</body>
</html>