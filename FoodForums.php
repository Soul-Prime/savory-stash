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
            background: linear-gradient(to right, #aed9e0, #ffffff );
            color: #333;
            font-family: Arial, sans-serif;
        }

nav {
    text-align: center; 
    padding: 10px; 
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
form {
            text-align: center;
            margin-top: 50px; 
        }
</style>  

</html>           
<?php
// Database credentials
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

function sanitize($str)
{
    return htmlentities($str);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Title = isset($_POST['Title']) ? sanitize($_POST['Title']) : '';
    $Description = isset($_POST['Description']) ? sanitize($_POST['Description']) : '';
    $Ingredients = isset($_POST['Ingredients']) ? sanitize($_POST['Ingredients']) : '';
    $Instructions = isset($_POST['Instructions']) ? sanitize($_POST['Instructions']) : '';

    // Process image upload
    $Image_path = '';
    if ($_FILES['image']['size'] > 0) {
        $target_dir = "assets/food_pics/"; // Directory 
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, store file path in database
            $Image_path = $target_file;
        } else {
            die("Error uploading file.");
        }
    }



    // Insert recipe into database
    $stmt = $pdo->prepare("INSERT INTO Recipes (Title, Description, Ingredients, Instructions, `Image path`) VALUES (:Title, :Description, :Ingredients, :Instructions, :Image_path)");
    $stmt->execute(array(
        'Title' => $Title,
        'Description' => $Description,
        'Ingredients' => $Ingredients,
        'Instructions' => $Instructions,
        'Image_path' => $Image_path
    ));

    // success message
    $successMessage = "Recipe submitted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Submission</title>
</head>
<body>
    <center><h2>Submit a New Recipe</h2>
    <?php if (isset($successMessage)) : ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <label for="Title">Title:</label><br>
        <input type="text" id="Title" name="Title" required><br><br>

        <label for="Description">Description:</label><br>
        <textarea id="Description" name="Description" required></textarea><br><br>

        <label for="Ingredients">Ingredients:</label><br>
        <textarea id="Ingredients" name="Ingredients" required></textarea><br><br>

        <label for="Instructions">Instructions:</label><br>
        <textarea id="Instructions" name="Instructions" required></textarea><br><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>

        <input type="submit" value="Submit Recipe">
    </form>
</body>
</html>