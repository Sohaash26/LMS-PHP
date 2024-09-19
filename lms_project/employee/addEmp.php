<?php
include_once "../navigation.php";
require_once "../connect.php";

$employeeList = $conn->query("SELECT * FROM employee "); 
$employeeData = $employeeList->fetchAll(PDO::FETCH_ASSOC); 

if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $emp_ID = validate($_POST['emp_ID']);
    $emp_name = validate($_POST['emp_name']);
    $password = validate(sha1($_POST['password']));
    $hire_date = validate($_POST['hire_date']);
    $salary = validate($_POST['salary']);
    $address = validate($_POST['address']);
    $DOB = validate($_POST['DOB']);
    $dept_name = validate($_POST['dept_name']);



    if (!empty($emp_ID) && !empty($emp_name) && !empty($password) && !empty($hire_date) && !empty($salary) && !empty($address) && !empty($DOB) && !empty($dept_name)) 
    {
   $stmt = "INSERT INTO `employee`(`emp_ID`, `emp_name`, `password`, `hire_date`, `salary`, `address`, `DOB`, `dept_name`) VALUES (' $emp_ID ','$emp_name','$password',' $hire_date ','$salary ',' $address','$DOB','$dept_name')";
   $result = $conn->query($stmt);
        
   echo '<script>alert("Employee Inserted Successfully!")</script>';
  
   }
   else{
    echo '<script>alert("Failed To Inset Supplier!")</script>';

   }
}
?>
<html>

<head>
<title>Employee: Add Employee</title>
<link rel="stylesheet" href="style.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="lms.css"> -->
</head>

<body>
    <center>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">

            <div>
                <label>ID:</label>
                <div>
                    <input type="number" name="emp_ID" required>
                </div>
            </div>
            <div>
                <label>Name:</label>
                <div>
                    <input type="text" name="emp_name" required>
                </div>
            </div>
            <div>
                <label>Password:</label>
                <div>
                    <input type="password" name="password" required>
                </div>
            </div>
            <div>
                <label>Hire Date:</label>
                <div>
                    <input type="date" name="hire_date" required>
                </div>
            </div>
            <div>
                <label>Salary:</label>
                <div>
                    <input type="number" name="salary" required>
                </div>
            <div>
                <label>Address:</label>
                <div>
                    <input type="text" name="address" required>
                </div>
            </div>
           
            <div>
                <label>DOB:</label>
                <div>
                    <input type="date" name="DOB" required>
                </div>
            </div>
            <div>
                <label>Department Name:</label>
                <div>
                    <input type="text" name="dept_name">
                </div>
            </div>
           
            <div>
                <input type="submit" name="submit" value="ADD">
            </div>
            </div>
        </form>
    </center>
</body>
</html>