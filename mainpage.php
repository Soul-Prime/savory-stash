<?php
$primaryColor = '#98FB98'; //Mint
$secondaryColor = '#00FF7F'; //Gold
$tertiaryColor = '#2E8B57'; //Light Sea Green
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
    <?php
echo "<div style='text-align: center;'>";
echo "<h1>The Recipe Collection";
echo "</div>";
?>
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
            background: linear-gradient(280deg, <?php echo $primaryColor; ?>, <?php echo $secondaryColor; ?>, <?php echo $tertiaryColor; ?>);
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
    </header>
    <?php
echo "<div style='text-align: center;'>";
echo "<br><p1>Welcome to The Recipe Collection aka The Savery Stash! I welcome all food lovers and chefs to share their favorite foods on my webpage abd look for more new recipes. Have fun!";
echo "</div>";
?>
         
        <section class="recipe-card">
        <?php
echo "<div style='text-align: center;'>";
echo "<h2>Featured Recipe";
echo "</div>";
?> 
            <?php
            
            function fetchRandomFeaturedRecipe() {
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=recipes', 'webapp', 'Apples');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $sql = "SELECT * FROM recipes ORDER BY RAND() LIMIT 1";
                    $stmt = $pdo->query($sql);
                    if ($stmt) {
                        return $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                    return false;
                } catch (PDOException $e) {
                    die("Could not connect to the database 'recipes' : " . $e->getMessage());
                }
            }
            
            
            $featuredRecipe = fetchRandomFeaturedRecipe();
            
            if ($featuredRecipe !== false && isset($featuredRecipe['Title']) && isset($featuredRecipe['Description'])) {
            ?>
                <div class="recipe-card">
                    <h3><?php echo $featuredRecipe['Title']; ?></h3>
                    <p><?php echo $featuredRecipe['Description']; ?></p>
                    <img src="<?php echo $featuredRecipe['Image path']; ?>" alt="<?php echo $featuredRecipe['Title']; ?>">
                    
                </div>
            <?php
            } else {
                echo "<p>No featured recipe found</p>";
            }
            ?>
          <style>

.recipe-card {
    text-align: center; 
    margin: 0 auto; 
    max-width: 400px; 
}
</style> 
        </section>
    </main>
    <footer>
    <?php
echo "<div style='text-align: center;'>";
echo "<p>&copy; 2024 My Recipe Collection. All rights reserved.</p>";
echo "</div>";
?>    
    </footer>
</body>
</html>