<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savery Stash</title>
  
</head>
<body>
    <header>

        <nav>
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="Details.php">Details</a><li>
                <li><a href="FoodForums.php">Forms</a><li>
              
            </ul>
        </nav>
        <style>
/* CSS styles for centering and styling the navigation bar */
nav {
    text-align: center; /* Center-align the entire navigation */
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline; /* Inline display for horizontal list */
    margin-right: 20px; /* Add spacing between list items */
}

nav ul li a {
    text-decoration: none;
    color: #333; /* Change link color */
    font-weight: bold; /* Make link text bold */
}

nav ul li a:hover {
    color: #007bff; /* Change link color on hover */
}
</style>
</html>
<?php

session_start();


$_SESSION = array();
session_destroy();


header("Location: Login.php");
exit();
?>