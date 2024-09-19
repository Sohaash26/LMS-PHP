<!-- <?php
// session_start();
// if (isset($_SESSION['user_id'])) {
//     header("location: dashboard_LMS.php");
// }
// require_once "connect.php";
// if (isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = sha1($_POST['password']);
//     $adminList = $conn->query("SELECT * FROM users WHERE username= '$username' AND password = '$password' AND is_admin=1"); //object
//     $adminData = $adminList->fetch(PDO::FETCH_ASSOC);
//     $rowCount = $adminList->rowCount();
//     if ($rowCount > 0) {
//         $user_id = $adminData['user_id'];
//         $_SESSION['user_id'] = $user_id;
//         header("location: dashboard_LMS.php");
//     } else {
//         echo "not exist username or password";
//     }
// }
    
    

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Library admin login</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Library Admin Login
         </div>
         <form action="../dashboard_LMS.php" method= "POST">
            <div class="field">
               <input type="text" required>
               <label>Username</label>
            </div>
            <div class="field">
               <input type="password" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
         </form>
      </div>
   </body>
</html> -->