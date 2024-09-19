<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("location: ../addSupplier.php");
// }

?>
<html>

<head>
    <style>
        /* nav {
            background-color: #333;
            height: 70px;
            line-height: 70px;
        }

        nav a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            margin-left: 30px;
        }

        html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: #f2f2f2;
   background: linear-gradient(-135deg, #c850c0, #4158d0); 
}
::selection{
  background: #4158d0;
  color: #fff;
} */
nav 
{
    background-color: #ffffff;
    padding-bottom: 12px; 
    font-family: arial;
        margin-top: 0px;
}
.navbar 
{
  text-transform:uppercase;
  overflow: hidden;
  font-family: Arial;
  display: inline-block;
  padding-left: 10%;
  padding-right: 10%;
  background-color: #ADD8E6;
    min-width: 820px;
    margin-right: 0px;
}
.navbar a 
{
  float: left;
  font-size: 16px;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.dropdown 
{
  float: left;
  overflow: hidden;
}
.dropdown .dropbtn 
{
  text-transform: uppercase;
  font-size: 16px;
  border: none;
  outline: none;
  color: #ffffff;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
}
.navbar a:hover, .dropdown:hover .dropbtn, .dropdown a:visited 
{
  background-color: #ADD8E6;
  color: white;
}
.navbar a:link, .navbar a:visited
{
    color:white;
}
.dropdown-content 
{
  display: none;
  position: absolute;
  background-color: #5d526a;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a
{
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropdown-content a:hover
{
  background-color: #5d526a;
}
.dropdown:hover .dropdown-content 
{
  display: block; 
}
    </style>
</head>

<body>
    <!-- <nav>
        <a href="../dashboard.php">Home</a>
        <a href="../employee/">Employee</a>
        <a href="../borrowed_book/">Borrowed Books</a>
        <a href="../supplier/">Suppliers</a>
        <a href="../project/">Fines</a>
        <a href="../logout.php">logout</a>
    </nav> -->
    


     <!-- <!DOCTYPE html>
<html lang="en">
    <head> 
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale-1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="lms.css">
<title> Home </title>
</head>
    
<body>-->
<nav> 
<div class="navbar">
		<a href="../dashboard_LMS.php">Home</a>
        <a href="../employee/">Employee</a>
        <div class="dropdown">
    <button class="dropbtn">Books
    </button>
    <div class="dropdown-content">
    <!-- <a href="../book/viewbook.php">View Books</a> -->
		<a href="../book/addbook.php">Add Books</a>
        <a href="../book/deletebook.php">Manage Books</a>
        <!-- <a href="../book/editbook.php">Edit Books</a> -->
</div>
</div>
        <a href="../borrowed_book/">Borrowed Books</a>
        <a href="../supplier/">Suppliers</a>
        <a href="../logout.php">logout</a>
        
  
</div>
		
	
</nav> 