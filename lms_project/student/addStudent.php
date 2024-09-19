<?php
include_once "../navigation.php";
require_once "../connect.php";

$studentList = $conn->query("SELECT * FROM student "); 
$studentData = $studentList->fetchAll(PDO::FETCH_ASSOC); 

if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $std_ID = validate($_POST['std_ID']);
    $std_name = validate($_POST['std_name']);
    $std_year = validate($_POST['std_year']);
    $std_faculty = validate($_POST['std_faculty']);
    $std_DOB = validate($_POST['std_DOB']);
    $std_address = validate($_POST['std_address']);



    if (!empty($std_ID) && !empty($std_name) && !empty($std_year) && !empty($std_faculty) && !empty($std_DOB) && !empty($std_address)) 
    {
   $stmt = "INSERT INTO `student`(`std_ID`, `std_name`, `std_year`, `std_faculty`, `std_DOB`, `std_address`) VALUES ('$std_ID','$std_name','$std_year','$std_faculty','$std_DOB','$std_address')";
   $result = $conn->query($stmt);
        
   echo '<script>alert("Student Inserted Successfully!")</script>';
  
   }
}
?>
<html>

<head>
<title>Student: Add Student</title>
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
                    <input type="number" name="std_ID" required>
                </div>
            </div>
            <div>
                <label>Name:</label>
                <div>
                    <input type="text" name="std_name" required>
                </div>
            </div>
            <div>
                <label>Acdemic Year:</label>
                <div>
                <input type="text" name="std_year" required>
                </div>
            </div>
            <div>
                <label> Faculty:</label>
                <div>
                    <input type="name" name="std_faculty" required>
                </div>
            </div>
            <div>
                <label>DOB:</label>
                <div>
                    <input type="date" name="std_DOB" required>
                </div>
            </div>
            
            <div>
                <label>Address:</label>
                <div>
                    <input type="text" name="std_address" required>
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