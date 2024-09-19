<?php
include_once "../navigation.php";
require_once "../connect.php";


$studentList = $conn->query("SELECT std_ID, std_name FROM student"); 
$studentData = $studentList->fetchAll(PDO::FETCH_ASSOC);
$bookList = $conn->query("SELECT book_id FROM book"); 
$bookData = $bookList->fetchAll(PDO::FETCH_ASSOC); 
$empList = $conn->query("SELECT emp_ID, emp_name FROM employee"); 
$empData = $empList->fetchAll(PDO::FETCH_ASSOC); 
$borrowedList = $conn->query("SELECT * FROM borrowed_book"); 
$borrowedData = $borrowedList->fetchAll(PDO::FETCH_ASSOC); 
  


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
                      
        $stmt = "INSERT INTO `borrowed_book`(`std_id`, `book_id`, `date_borrowed`, `return_date`, `emp_id_fk`) VALUES ('$std_id','$book_id','$date_borrowed','$return_date','$emp_id_fk')";       
        $result = $conn->query($stmt);  
        

        if($result){
            
            echo '<script>alert("Borrowed Book ADDED Successfully!")</script>';
           
        }
        else{
            echo '<script>alert("Failed to Add Borrowed Book!")</script>';
        }
        
     
    }
    //  echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die();
}

?>
<html>

<head>
<title>Borrowed Book: Add Borrowed Book</title>
<link rel="stylesheet" href="style.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="lms.css"> -->

</head>

<body>
    <center>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">

            <div>
                <label>Student ID:</label>
                <div>
                    <select name="std_ID">
                        <option></option>
                        <?php foreach ($studentData as $std) { ?>
                            <option value="<?php echo $std['std_ID'] ?>"><?php echo $std['std_ID']. " - " . $std['std_name'] ?></option>
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
                            <option value="<?php echo $book['book_id'] ?>"><?php echo $book['book_id'] ?></option>
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
                            <option value="<?php echo $emp['emp_ID'] ?>"><?php echo $emp['emp_ID']. " - " . $emp['emp_name'] ?></option>
                        <?php } ?>
                    </select>
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

