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
        <h1>My Recipe Collection</h1>
        <nav>
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="#">Logout</a></li>
                <li><a href="#">Details</a><li>
                <li><a href="#">Forms</a><li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>
    <main>
         <section class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search recipes...">
                <button type="submit">Search</button>
            </form>
        </section>
        <section class="featured-recipe">
            <h2>Featured Recipe</h2>
            <?php
            // Fetch data for featured recipe from the database (assuming you have a database connection)
            function fetchFeaturedRecipe() {
                try{
                    $pdo = new PDO('mysql:host=localhost;dbname=Recipes', 'webapp', 'Apples');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $sql = "SELECT * FROM Recipes WHERE featured = 1 LIMIT 1";
               $stmt = $pdo->query($sql);
               if ($stmt) {
                    
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                }

                return false;
               
                } catch (PDOException $e) {
                    die("Could not connect to the database 'Recipes' : " . $e->getMessage());
                }

            }
            
            // Call the function to get the featured recipe
            $featuredRecipe = fetchFeaturedRecipe();
            ?>
            <div class="recipe-card">
                <h3><?php echo $featuredRecipe['title']; ?></h3>
                <p><?php echo $featuredRecipe['description']; ?></p>
                <a href="#">View Recipe</a>
            </div>
        </section>
        <section class="recipe-grid">
            <h2>Recent Recipes</h2>
            <div class="grid-container">
                <?php
                
                if (!function_exists('fetchFeaturedRecipe')) {
                    function fetchFeaturedRecipe() {
                       
                        $pdo = new PDO('mysql:host=localhost;dbname=Recipes', 'webapp', 'Apples');
                      
                        $sql = "SELECT * FROM Recipes WHERE featured = 1 LIMIT 1";
                    
                        $stmt = $pdo->query($sql);
                       
                        if ($stmt) {
                          
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                   
                        return false;
                    }
                }
                
                // Call the function to get the featured recipe
                $featuredRecipe = fetchFeaturedRecipe();
                foreach ($recentRecipes as $recipe) {
                    ?>
                    <div class="recipe-card">
                        <h3><?php echo $recipe['title']; ?></h3>
                        <p><?php echo $recipe['description']; ?></p>
                        <a href="#">View Recipe</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2022 My Recipe Collection. All rights reserved.</p>
    </footer>
</body>
</html>