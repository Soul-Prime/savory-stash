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
                <li><a href="Signup.php">Signup</a><li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="Details.php">Details</a><li>
                <li><a href="FoodForums.php">Forms</a><li>
              
            </ul>
        </nav>
        <style>

nav {
    text-align: center; 
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline; 
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
    font-weight: bold; 
}

nav ul li a:hover {
    color: #007bff; 
}
</style>
</html>
<?php

session_start();


$_SESSION = array();
session_destroy();


header("Location: mainpage.php");
exit();
?>