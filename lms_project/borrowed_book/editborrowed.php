<?php
include_once "../navigation.php";
require_once "../connect.php";
if (isset($_GET['borrowed_id'])) {
    $borrowed_id = $_GET['borrowed_id'];
} else {
    $borrowed_id = 0;
}

// $allemployeeList = $conn->query("SELECT * FROM employee "); 
// $allemployeeData = $employeeList->fetchAll(PDO::FETCH_ASSOC); 

$studentList = $conn->query("SELECT std_ID, std_name FROM student"); 
$studentData = $studentList->fetch(PDO::FETCH_ASSOC);
$bookList = $conn->query("SELECT book_id FROM book"); 
$bookData = $bookList->fetch(PDO::FETCH_ASSOC); 
$empList = $conn->query("SELECT emp_ID, emp_name FROM employee"); 
$empData = $empList->fetch(PDO::FETCH_ASSOC); 
$borrowedList = $conn->query("SELECT * FROM borrowed_book"); 
$borrowedData = $borrowedList->fetch(PDO::FETCH_ASSOC); 
  


if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
   
    $date_borrowed= validate($_POST['date_borrowed']);
    $return_date = validate($_POST['return_date']);
    
   
   

   

    if (!empty($std_id) && !empty($book_id)  && !empty($date_borrowed) && !empty($return_date)  && !empty($emp_id_fk) ) 
    {
                      
        $stmt = "UPDATE `borrowed_book` SET `std_id`='$std_id',`book_id`='$book_id',`borrowed_id`=' $borrowed_id',`date_borrowed`='$date_borrowed',`return_date`='$return_date',`emp_id_fk`='$emp_id_fk' WHERE borrowed_id = $borrowed_id";       
        $result = $conn->query($stmt);  
        

        if($result){
            
            echo '<script>alert("Borrowed Book Updated Successfully!")</script>';
           
        }
        else{
            echo '<script>alert("Failed to Updated Borrowed Book!")</script>';
        }
        
     
    }
}

?>
<html>

<head>
<title>Book: Edit Book</title>
<link rel="stylesheet" href="style.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="lms.css"> -->
</head>

<body>
<center>
        <form method="post" enctype="multipart/form-data" action="editborrowed.php?borrowed_id=<?php echo $_SERVER['PHP_SELF'] ?>">

            <div>
                <label>Student ID:</label>
                <div>
                    <select name="std_ID">
                        <option></option>
                        <?php foreach ($studentData as $std) { ?>
                            <option value="<?php echo $std['std_ID'] ?>" <?php if ($std['std_ID'] == $studentData['std_ID']) { ?> selected <?php } ?>><?php echo $std['std_ID'] . " - " . $std['std_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div>
                <label>Book ID:</label>
                <div>
                    <select name="book_id">
                        <option></option>
                        <?php foreach ($bookData as $book) { ?>
                            <option value="<?php echo $book['book_id'] ?>" <?php if ($book['book_id'] == $bookData['book_id']) { ?> selected <?php } ?>><?php echo $std['book_id'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div>
                <label>Date Borrowed:</label>
                <div>
                    <input type="date" name="date_borrowed" required>
                </div>
            </div>
            <div>
                <label>Return Date:</label>
                <div>
                    <input type="date" name="return_date" required>
                </div>
            </div>
            <div>
                <label>Employee ID:</label>
                <div>
                    <select name="emp_ID">
                        <option></option>
                        <?php foreach ($empData as $emp) { ?>
                            <option value="<?php echo $emp['emp_ID'] ?>" <?php if ($emp['emp_ID'] == $empData['emp_ID']) { ?> selected <?php } ?>><?php echo $emp['emp_ID'] ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>
           
            <div>
                <input type="submit" name="submit" value="Edit">
            </div>
            </div>
        </form>
    </center>
</body>
</html>

