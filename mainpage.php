<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Recipe Collection</title>
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
            $featuredRecipe = fetchFeaturedRecipe(); // You need to implement this function
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
                // Fetch data for recent recipes from the database (assuming you have a database connection)
                $recentRecipes = fetchRecentRecipes(); // You need to implement this function
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