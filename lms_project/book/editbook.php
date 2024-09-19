<?php
include_once "../navigation.php";
require_once "../connect.php";
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
} else {
    $book_id = 0;
}

// $allemployeeList = $conn->query("SELECT * FROM employee "); 
// $allemployeeData = $employeeList->fetchAll(PDO::FETCH_ASSOC); 

$supplierList = $conn->query("SELECT supplier_ID, sup_name FROM supplier"); 
$supplierData = $supplierList->fetch(PDO::FETCH_ASSOC);
$bookList = $conn->query("SELECT * FROM book "); 
$bookData = $bookList->fetch(PDO::FETCH_ASSOC); 


if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $new_book_id = validate($_POST['book_id']);
    $book_title = validate($_POST['book_title']);
    $book_description = validate($_POST['book_description']);
    $book_item = validate($_POST['book_item']);
    $genre = validate($_POST['genre']);
    $compensation = validate($_POST['compensation']);
    //$image= validate($_POST['image']);
    $ISBN = validate($_POST['ISBN']);
    $supplier_id = $_POST['supplier_id'];



    if (!empty($new_book_id) && !empty($book_title) && !empty($book_description) && !empty($book_item) && !empty($genre)  && !empty($ISBN) ) 
    {
        $image_name = $_FILES['image']['name'];
        if (!empty($image_name)) {
            $allowedExt = ["png", "jpg", "jpeg"];
            $tmp_name = $_FILES['image']['tmp_name'];
            $image_array = explode(".", $image_name);
            $ext = end($image_array);
            $ext = strtolower($ext);
            $image_name = $book_id . "." . $ext;

            if (in_array($ext, $allowedExt)) {
                if (move_uploaded_file($tmp_name, "../upload/images/" . $image_name)) {
                    $stmt = "UPDATE `book` SET `book_id`='$new_book_id',`book_title`='$book_title)',`book_description`='$book_description',`book_item`='$book_item',`genre`='$genre',`compensation`='$compensation',`image`='$image_name',`ISBN`='$ISBN',`supplier_id`='$supplier_id' WHERE  book_id = $book_id";
                }
            }
        }
        else if (!empty($empData['image'])) { // old image
            $image_name = $empData['image']; // old image name
            $stmt = "UPDATE `book` SET `book_id`='$new_book_id',`book_title`='$book_title)',`book_description`='$book_description',`book_item`='$book_item',`genre`='$genre',`compensation`='$compensation',`image`='$image_name',`ISBN`='$ISBN',`supplier_id`='$supplier_id' WHERE  book_id = $book_id";
        } else {
            $stmt = "UPDATE `book` SET `book_id`='$new_book_id',`book_title`='$book_title)',`book_description`='$book_description',`book_item`='$book_item',`genre`='$genre',`compensation`='$compensation',`ISBN`='$ISBN',`supplier_id`='$supplier_id' WHERE  book_id = $book_id";
        }

            $result = $conn->query($stmt);
            if($result){
                echo '<script>alert("Failed To Update!")</script>';
            }
            else{

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
        <form method="post" enctype="multipart/form-data" action="editbook.php?book_id=<?php echo $_SERVER['PHP_SELF'] ?>">

            <div>
                <label>Book ID:</label>
                <div>
                    <input type="number" name="book_id" value="<?php echo $bookData['book_id']; ?>" required>
                </div>
            </div>
            <div>
                <label>Book Title:</label>
                <div>
                    <input type="text" name="book_title" value="<?php echo $bookData['book_title']; ?>"required>
                </div>
            </div>
            <div>
                <label>Book Description:</label>
                <div>
                    <input type="text" name="book_description"value="<?php echo $bookData['book_description']; ?>" required>
                </div>
            </div>
            <div>
                <label>Item:</label>
                <div>
                    <input type="number" name="book_item"value="<?php echo $bookData['book_item']; ?>" required>
                </div>
            </div>
            <div>
                <label>Genre:</label>
                <div>
                    <input type="text" name="genre"value="<?php echo $bookData['genre']; ?>" required>
                </div>
            <div>
            </div>
                <label>Book Cover:</label>
                <div>
                    <input type="file" name="image"value="<?php echo $bookData['image']; ?>" required>
                </div>
                <div>
                    <?php if (!empty($bookData['image'])) { ?>
                        <img src="../upload/images/<?php echo $bookData['image'] ?>" width="90">
                    <?php } else { ?>
                        <div style="width: 100;height:100;border:2px solid #333"></div>
                    <?php } ?>

                </div>
            </div>
           
            <div>
                <label>Compensation:</label>
                <div>
                    <input type="number" name="compensation"value="<?php echo $bookData['compensation']; ?>" >
                </div>
            </div>
            <div>
                <label>ISBN:</label>
                <div>
                    <input type="number" name="ISBN"value="<?php echo $bookData['ISBN']; ?>"required>
                </div>
            </div>
            <div>
                <label>Supplier ID:</label>
                <div>
                    <select name="supplier_id">
                        <option></option>
                        <?php foreach ($supplierData as $supplier) { ?>
                            <option value="<?php echo $supplier['supplier_ID'] ?>" <?php if ($supplier['supplier_ID'] == $bookData['supplier_id']) { ?> selected <?php } ?>><?php echo $supplier['supplier_ID']. " - " . $supplier['sup_name'] ?></option><br><br>
                        <?php } ?>
                    </select>
                </div>
            </div> 
           
            <div>
                <input type="submit" name="submit" value="Edit">
            </div>
        </form>
    </center>
</body>
</html>

