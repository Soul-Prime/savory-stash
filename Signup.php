<?php
$primaryColor = '#98FB98'; 
$secondaryColor = '#00FF7F'; 
$tertiaryColor = '#2E8B57';
$borderTopColor = '#FF5733'; // Red
        $borderRightColor = '#F0E68C'; // Khaki
        $borderBottomColor = '#4682B4'; // Steel Blue
        $borderLeftColor = '#7FFF00'; // Chartreuse 
// Database connection parameters
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

// Process signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
   
    $username = $_POST['username'];
    $email = $_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security 
   $Full_name =$_POST [ 'Full_name']; 
    $role = $_POST['role'];
    // Insert user data into the database
    $stmt = $pdo->prepare("INSERT INTO Users (Username, Email, Password, Full_Name, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$username, $email, $password, $Full_name, $role]);

    // Redirect to login page after successful signup
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <heeder>
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
    
</header>
<style>

body {
    body {
font-family: Arial, sans-serif;
background-color: #f0f0f0;
}

.container {
    text-align: center;
    max-width: 400px; /* Adjust the width as needed */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px;  
}
form
{
    display: inline-block; /* Display the form as an inline block */
    text-align: left; /* Left-align the form fields */
    
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
</head>
<body>
<div class="container">
<h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

    <label for="Full_Name">Name:</label><br>
<input type="text" id="Full_name" name="Full_Name" required><br><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
         
        <label for="role">Role:</label><br>
<select id="role" name="role">
    <option value="user">Guest</option>
    <option value="admin">Admin</option>
</select><br><br>

        <input type="submit" value="Sign Up">
    </form>
</div>
</body>
</html>