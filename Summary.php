<html>
<?php
$borderTopColor = '#FF5733'; // Red
$borderRightColor = '#F0E68C'; // Khaki
$borderBottomColor = '#4682B4'; // Steel Blue
$borderLeftColor = '#7FFF00'; // Chartreuse


?>
<nav>
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="Details.php">Details</a><li>
                <li><a href="FoodForums.php">Forms</a><li>
                <li><a href="Summary.php">Summary</a><li>
              
            </ul>
        </nav>
        <style> 
        img {
            max-width: 100%;
            height: auto;
        }

            .food.image{
                border-left: 2px solid #333;
                border-right: 2px solid #333;
            }
            .recipe-card{
             
                padding: 20px;
                border: 3px solid #fdc89a;
                border-radius: 5px;
                margin: 5px;
                background-color: #29c5f6;
            }
 body {
            background: linear-gradient(to right, #aed9e0, #ffffff );
            color: #333;
            font-family: Arial, sans-serif;
        }
nav {
    text-align: center; 
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
    text-align: center;
}

nav ul li {
    display: inline; 
    margin-right: 20px; 
}

nav ul li a {
    text-decoration: none;
    padding: 10px;
    color: #333; 
    font-weight: bold; 
}

nav ul li a:hover {
    color: #007bff; 
}
</style>
<section>
    
        <center><h2>All Recipes</h2>
        <?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=recipes', 'webapp', 'Apples');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT Title, Description, `Image path` FROM recipes";
        $stmt = $pdo->query($sql);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='recipe-card'>";
                echo "<h3>" . htmlspecialchars($row['Title']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['Description']) . "</p>";
                // Correctly construct the image path
                $imagePath = "assets/food pics/" . htmlspecialchars($row['Image path']);
                echo "<img src='" . $imagePath . "' alt='" . htmlspecialchars($row['Title']) . "'>";
                echo "</div>";
            }
        } else {
            echo "<p>No recipes found.</p>";
        }
    } catch (PDOException $e) {
        die("Could not connect to the database 'recipes' : " . $e->getMessage());
    }
    $recipeToUpdate = "California Roll";
    $newImagePath = 'assets/food_pics/California_Roll.jpg'; // New file path after renaming
    try {
        // Update the image path in the database
        $stmt = $pdo->prepare("UPDATE recipes SET `Image path` = :newImagePath WHERE Title = :title");
        $stmt->execute(['newImagePath' => $newImagePath, 'title' => $recipeToUpdate]);
        echo "<p>Image path updated for '" . $recipeToUpdate . "'</p>";
    } catch (PDOException $e) {
        die("Error updating image path: " . $e->getMessage());
    }
    ?>
    </section>
</html>