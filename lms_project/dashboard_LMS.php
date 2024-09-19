<?php

// action="dashboard_LMS.php" 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
}
require_once "connect.php";
include_once "navigation.php";


?>
<html>

<head>
    <!-- <style>
        nav {
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
    </style> -->
    <link rel="shortcut icon" href="Photos/icons8-books-100.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="UTF-8">
    <meta name="keywords" content="Books, Reading, Bookstore">
    <meta name="description" content="Online Bookstore for Reading Lovers">
    <meta name="author" content="Mennatullah Radwan">
    <!-- <meta http-equiv="refresh" content="30"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Styles/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&family=Redressed&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">



    <style>
        #content {
            background-image: url("Photos/background.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .nav-bar {
            background-color: #ff99dd;
            overflow: hidden;
            position: fixed;
            text-align: center;
            /* overflow: hidden; */
            /* margin: 0%; */
            /* position: fixed; */
            font-family: 'Open Sans Condensed', sans-serif;
            width: 100%;
            top: 0%;
            left: 0;
            right: 0;

        }


        /* #nav-menu a:hover {
            background-color: white;
            color: #ff99dd;
        } */

        #logo {
            display: inline-block;
            *display: inline;
            list-style-type: none;
            vertical-align: middle;
        }

        li a {
            display: inline-block;
            padding: 15px;
            text-decoration: none;
            /* color: wheat; */
        }

        li a:hover {
            background-color: white;
            color: #ff99dd;
            text-decoration: none;
        }

        a:link {
            background-color: #ff99dd;
            color: white;
            text-decoration: none;


        }

        a:visited {
            background-color: #ff99dd;
            color: white;
            text-decoration: none;

        }

        .nav-font {
            font-size: larger;
            font-family: 'Festive', cursive;
            font-family: 'Redressed', cursive;
            margin: 0%;
            padding: 8px;
        }

        .logo-name {
            background-color: #ff99dd;
            /* text-align: left; */
            /* margin: 0%; */
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            right: 0;
        }

        .first-paragraph {
            background-color: rgba(248, 248, 248, 0.7);
            border: 2px;
            margin-left: auto;
            margin-right: auto;
            width: 90%;
            text-align: center;
        }

        .second-paragraph {
            background-color: rgba(248, 248, 248, 0.7);
            border: 2px;
            margin-left: auto;
            margin-right: auto;
            width: 90%;
            text-align: center;
        }

        .fa {
            padding: 20px;
            font-size: 30px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }

        footer {
            text-align: center;
            padding: 3px;
            background-color: #ff99dd;
            color: white;
        }

        .dropbtn {
            background-color: #ff99dd;
            color: white;
            /* padding: 16px; */
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #ff99dd;
        }
    </style>
</head>







</head>

<body>
    <!-- <nav>
        <a href="dashboard_LMS.php">Home</a>
        <a href="employee/">Employees</a>
        <a href="book/">Books</a>
        <a href="student/">Students</a>
        <a href="supplier/">Suppliers</a>
        <a href="borrowed_book/">Borrowed Books</a>
        <a href="logout.php">logout</a>
    </nav> -->
    <h1 align="center">Welcome.<?php echo"$username?$user_id"?> To Dashboard</h1>













    <footer class="footer"> 
    <!-- <a href="contactus.html"> <h1> Contact Us</h1></a> -->
    <em> Cairo, Egypt </em> <br>
    <a href="mailto:unilms@gmail.com"> unilms@gmail.com</a><br><br>
    <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
    <a href="https://twitter.com/explore" class="fa fa-twitter"></a>
    <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
</div>    
</footer>
</body>

</html>