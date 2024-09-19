<?php

require_once "../connect.php";
include_once "../navigation.php";


if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $supplier_ID = validate($_POST['supplier_ID']);
    $sup_name = validate($_POST['sup_name']);
    $address = validate($_POST['address']);
    $start_date = validate($_POST['start_date']);




    if (!empty($supplier_ID) && !empty($sup_name) && !empty($address) && !empty($start_date) ) 
    {
   $stmt = "INSERT INTO `supplier`(`supplier_ID`, `sup_name`, `address`, `start_date`) VALUES ('$supplier_ID','$sup_name','$address','$start_date')";
   $result = $conn->query($stmt);
        
   echo '<script>alert("Supplier Inserted Successfully!")</script>';
  
   }
   else{
    echo '<script>alert("Failed To Inset Supplier!")</script>';

   }
}
?>
<html>

<head>
<title>Supplier: Add Supplier</title>
<link rel="stylesheet" href="style.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="lms.css"> -->
</head>

<body>
    <center>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">

            <div>

            <div>
                <label>Supplier ID</label>
                <div>
                    <input type="number" name="supplier_ID" required>
                </div>
            </div>
                <label>Supplier Name</label>
                <div>
                    <input type="text" name="sup_name" required>
                </div>
            </div>
          

            <div>
                <label>Address</label>
                <div>
                    <input type="text" name="address" required>
                </div>
            </div>
            
            <div>
                <label>Start Date</label>
                <div>
                    <input type="date" name="start_date" required>
                </div>
            </div>
            
            
            <div>
                <input type="submit" name="submit" value="register">
            </div>
        </form>
    </center>
</body>

</html>