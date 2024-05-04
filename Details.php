<?php
$primaryColor = '#98FB98'; 
$secondaryColor = '#00FF7F'; 
$tertiaryColor = '#2E8B57';
$borderTopColor = '#FF5733'; // Red
        $borderRightColor = '#F0E68C'; // Khaki
        $borderBottomColor = '#4682B4'; // Steel Blue
        $borderLeftColor = '#7FFF00'; // Chartreuse 

        $host = 'localhost'; 
        $dbname = 'recipes'; 
        $username = 'webapp'; 
        $password = 'Apples'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>
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
                <li><a href="Summary.php">Summary</a><li>
            
              
            </ul>
        </nav>
        <style>

            body {
                body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto; /* Center the container */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
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
</style>
</header>
            <div class="container">
       <center> <h2>User Details</h2></center>
        <table>
            <thead>
            <tr>
                <th>Username</th>
                <th>Role</th>
            </tr>
</thead>
<tbody>
            <?php
// Fetch data from the users table
$stmt = $pdo->query("SELECT `Username`, role FROM Users");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Username']) . "</td>";
    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
    echo "</tr>";
}
?>
            </tbody>
        </table>
    </div>
</body>
</html>