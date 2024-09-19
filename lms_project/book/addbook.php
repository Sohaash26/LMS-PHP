<?php
include_once "../navigation.php";
require_once "../connect.php";


$supplierList = $conn->query("SELECT supplier_ID, sup_name FROM supplier"); 
$supplierData = $supplierList->fetchAll(PDO::FETCH_ASSOC);
$bookList = $conn->query("SELECT * FROM book "); 
$bookData = $bookList->fetchAll(PDO::FETCH_ASSOC); 
  


if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $book_id = validate($_POST['book_id']);
    $book_title = validate($_POST['book_title']);
    $book_description = validate($_POST['book_description']);
    $book_item = validate($_POST['book_item']);
    $genre = validate($_POST['genre']);
    $compensation = validate($_POST['compensation']);
    // $image = validate($_POST['image']);
    $ISBN = validate($_POST['ISBN']);
    $supplier_id = $_POST['supplier_id'];

   

    if (!empty($book_id) && !empty($book_title) && !empty($book_description) && !empty($book_item) && !empty($genre)  && !empty($ISBN) ) 
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
                    $stmt = "INSERT INTO `book`(`book_id`, `book_title`, `book_description`, `book_item`, `genre`, `compensation`, `image`, `ISBN`, `supplier_id`) VALUES ('$book_id','$book_title','$book_description','$book_item','$genre','$compensation','$image_name','$ISBN','$supplier_id')";
                }
            }
        }
            else{

                $stmt = "INSERT INTO `book`(`book_id`, `book_title`, `book_description`, `book_item`, `genre`, `compensation`, `ISBN`, `supplier_id`) VALUES ('$book_id','$book_title','$book_description','$book_item','$genre','$compensation','$ISBN','$supplier_id')";
            }
            $result = $conn->query($stmt);
            if($result){
            echo '<script>alert("Book Inserted Successfully!")</script>';
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
<title>Book: Add Book</title>
<link rel="stylesheet" href="style.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="lms.css"> -->
</head>

<body>
    <center>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">

            <div>
                <label>Book ID:</label>
                <div>
                    <input type="number" name="book_id" required>
                </div>
            </div>
            <div>
                <label>Book Title:</label>
                <div>
                    <input type="text" name="book_title" required>
                </div>
            </div>
            <div>
                <label>Book Description:</label>
                <div>
                    <input type="text" name="book_description" required>
                </div>
            </div>
            <div>
                <label>Item:</label>
                <div>
                    <input type="number" name="book_item" required>
                </div>
            </div>
            <div>
                <label>Genre:</label>
                <div>
                    <input type="text" name="genre" required>
                </div>
            <div>
                <label>Book Cover:</label>
                <div>
                    <input type="file" name="image" required>
                </div>
            </div>
           
            <div>
                <label>Compensation:</label>
                <div>
                    <input type="number" name="compensation" >
                </div>
            </div>
            <div>
                <label>ISBN:</label>
                <div>
                    <input type="number" name="ISBN"required>
                </div>
            </div>
            <div>
                <label>Supplier ID:</label>
                <div>
                    <select name="supplier_id">
                        <option></option>
                        <?php foreach ($supplierData as $supplier) { ?>
                            <option value="<?php echo $supplier['supplier_ID'] ?>"><?php echo $supplier['supplier_ID']. " - " . $supplier['sup_name'] ?></option>
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

