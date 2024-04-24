<?php
$primaryColor = '#98FB98'; 
$secondaryColor = '#00FF7F'; 
$tertiaryColor = '#2E8B57';
$borderTopColor = '#FF5733'; // Red
        $borderRightColor = '#F0E68C'; // Khaki
        $borderBottomColor = '#4682B4'; // Steel Blue
        $borderLeftColor = '#7FFF00'; // Chartreuse 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savery Stash</title>
    <link rel="stylesheet" href="Recipestyles.css">
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
            body {
             background: linear-gradient(to right, #aed9e0, #ffffff );
            color: #333;
            font-family: Arial, sans-serif;
        }
/* CSS styles for centering and styling the navigation bar */
nav {
    text-align: center; /* Center-align the entire navigation */
    padding: 10px; /* Add padding for better visibility */
            border-top: 2px solid <?php echo $borderTopColor; ?>;
            border-right: 2px solid <?php echo $borderRightColor; ?>;
            border-bottom: 2px solid <?php echo $borderBottomColor; ?>;
            border-left: 2px solid <?php echo $borderLeftColor; ?>;
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
form {
            text-align: center;
            margin-top: 50px; /* Add some top margin for spacing */
        }

        /* Center-align the form inputs */
        input[type="email"], input[type="password"], input[type="submit"] {
            display: block;
            margin: 0 auto; /* Automatically center the inputs */
            width: 200px; /* Set the width of the inputs */
            margin-bottom: 10px; /* Add some bottom margin for spacing */
        }
</style>
</html>
<?php
$data = 'recipes';
$user = 'webapp';
$pass = 'Apples';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$data", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

require_once 'authenticate.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
echo "<div style='text-align: center;'>";
echo "<h2>Please Login";
echo "</div>";
?>
    
    <form action="authenticate.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Log In">
    </form>
</body>
</html>