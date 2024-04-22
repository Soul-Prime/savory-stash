CREATE DATABASE Recipes;
USE Recipes;

CREATE USER 'webapp'@'localhost' IDENTIFIED BY 'Apples';
GRANT ALL PRIVILEGES ON Recipes.* TO 'webapp'@'localhost';
ALTER USER 'webapp'@'localhost' IDENTIFIED BY 'Apples';

CREATE TABLE Recipes (
    Recipe_id INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255),
    Description TEXT,
    Ingredients TEXT,
    Instructions TEXT,
    `Image path` VARCHAR(255),
    Category_id INT,
    User_id INT,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Recipes (Title, Description, Ingredients, Instructions, `Image path`, Category_id, User_id, Created_at, Updated_at)
VALUES ('Spaghetti Carbonara', 'Classic Italian pasta dish made with eggs, cheese, bacon, and black pepper', 'Spaghetti, Eggs, Parmesan Cheese, Bacon, Black Pepper', '1. Cook spaghetti according to package instructions. 2. Fry bacon until crispy. 3. Whisk eggs and Parmesan cheese together in a bowl. 4. Toss cooked spaghetti with bacon and egg mixture. 5. Serve with freshly ground black pepper.', 'spaghetti_carbonara.jpg', 1, 1, NOW(), NOW());

INSERT INTO Recipes (Title, Description, Ingredients, Instructions, `Image path`, Category_id, User_id, Created_at, Updated_at)
VALUES ('Birria Tacos', 'Authentic Mexican tacos filled with juicy and flavorful birria meat', '2 lb beef chuck roast, 2 dried guajillo chilies, 2 dried ancho chilies, 1 onion, 4 cloves garlic, 2 bay leaves, 1 tsp cumin, 1 tsp oregano, Salt and pepper to taste, 12 corn tortillas, 1 cup chopped cilantro, 1/2 cup diced onion, Lime wedges for serving', '1. Preheat oven to 325°F (165°C). 2. Season beef with salt and pepper. 3. Place chilies in a bowl and cover with boiling water. Let soak for 15 minutes, then remove stems and seeds. 4. In a blender, combine chilies, onion, garlic, bay leaves, cumin, oregano, salt, and pepper. Blend until smooth. 5. Place beef in a roasting pan and pour chili mixture over the top. Cover with foil and roast for 3-4 hours, until beef is tender. 6. Shred beef with forks and keep warm. 7. Heat tortillas on a skillet until warm and pliable. 8. Fill tortillas with shredded beef and top with cilantro, onion, and a squeeze of lime. Serve with consommé for dipping.', 'birria_tacos.jpg', 1, 1, NOW(), NOW());

INSERT INTO Recipes (Title, Description, Ingredients, Instructions, `Image path`, Category_id, User_id, Created_at, Updated_at)
VALUES ('Chicken Sausage and Peppers', 'A delicious and easy-to-make dish featuring savory chicken sausage, sweet bell peppers, and onions.', '4 chicken sausages, 2 bell peppers (any color), 1 onion, 2 cloves garlic, 2 tbsp olive oil, 1 tsp Italian seasoning, Salt and pepper to taste', '1. Slice chicken sausages into rounds. 2. Slice bell peppers and onion into strips. Mince garlic. 3. Heat olive oil in a large skillet over medium heat. 4. Add chicken sausages to the skillet and cook until browned on both sides. Remove from skillet and set aside. 5. In the same skillet, add more olive oil if needed, then add bell peppers, onion, and garlic. Cook until vegetables are tender. 6. Return chicken sausages to the skillet and sprinkle with Italian seasoning, salt, and pepper. Stir to combine and cook for a few more minutes. 7. Serve hot, alone or over cooked rice or pasta.', 'chicken_sausage_peppers.jpg', 1, 1, NOW(), NOW());

INSERT INTO Recipes (Title, Description, Ingredients, Instructions, `Image path`, Category_id, User_id, Created_at, Updated_at)
VALUES ('Brisket', 'Tender and flavorful brisket slow-cooked to perfection.', '1 (5-pound) beef brisket, 2 tbsp salt, 2 tbsp black pepper, 2 tbsp garlic powder, 1 tbsp onion powder, 1 tbsp paprika, 1 tbsp brown sugar, 2 cups beef broth, 1 onion, 4 cloves garlic, 2 bay leaves', '1. Preheat oven to 275°F (135°C). 2. In a small bowl, combine salt, black pepper, garlic powder, onion powder, paprika, and brown sugar to make a rub. 3. Rub the brisket generously with the spice rub. 4. Place sliced onion, whole garlic cloves, and bay leaves in the bottom of a roasting pan. 5. Place the brisket on top of the onion mixture. 6. Pour beef broth over the brisket. 7. Cover the roasting pan with foil and roast in the preheated oven for 6-8 hours, or until the brisket is tender and easily shreds with a fork. 8. Remove the brisket from the oven and let it rest for 10-15 minutes before slicing. Serve hot with your favorite sides.', 'brisket.jpg', 1, 1, NOW(), NOW());

INSERT INTO Recipes (Title, Description, Ingredients, Instructions, `Image path`, Category_id, User_id, Created_at, Updated_at)
VALUES ('Rasta Pasta', 'A colorful and flavorful pasta dish inspired by Caribbean cuisine.', '8 oz penne pasta, 2 chicken breasts, 1 bell pepper (any color), 1 onion, 2 cloves garlic, 1 cup coconut milk, 1/2 cup heavy cream, 1/2 cup grated Parmesan cheese, 2 tbsp jerk seasoning, Salt and pepper to taste, 2 tbsp olive oil, Fresh parsley or cilantro for garnish', '1. Cook pasta according to package instructions until al dente. 2. Season chicken breasts with jerk seasoning, salt, and pepper. 3. Heat olive oil in a skillet over medium-high heat. 4. Add chicken breasts to the skillet and cook until browned on both sides and cooked through. Remove from skillet and set aside. 5. In the same skillet, add more olive oil if needed, then add sliced bell pepper, onion, and minced garlic. Cook until vegetables are tender. 6. Slice cooked chicken breasts into strips and return to the skillet. 7. Add coconut milk, heavy cream, and Parmesan cheese to the skillet. Stir until the sauce is creamy and well combined. 8. Add cooked pasta to the skillet and toss to coat in the sauce. 9. Serve hot, garnished with fresh parsley or cilantro.', 'rasta_pasta.jpg', 1, 1, NOW(), NOW());

INSERT INTO Recipes (Title, Description, Ingredients, Instructions, `Image path`, Category_id, User_id, Created_at, Updated_at)
VALUES ('Shepherd''s Pie', 'A classic comfort food dish made with ground meat, vegetables, and mashed potatoes.', '1 lb ground beef or lamb, 1 onion, 2 carrots, 2 cloves garlic, 1 cup frozen peas, 2 tbsp tomato paste, 1 cup beef or vegetable broth, 1 tsp Worcestershire sauce, Salt and pepper to taste, 4 cups mashed potatoes, 1/2 cup shredded cheddar cheese', '1. Preheat oven to 375°F (190°C). 2. Heat olive oil in a skillet over medium heat. 3. Add chopped onion, diced carrots, and minced garlic to the skillet. Cook until vegetables are softened. 4. Add ground beef or lamb to the skillet and cook until browned. Drain excess fat if necessary. 5. Stir in tomato paste, beef or vegetable broth, Worcestershire sauce, frozen peas, salt, and pepper. Simmer for 5-10 minutes until the mixture thickens. 6. Transfer the meat mixture to a baking dish and spread mashed potatoes evenly over the top. 7. Sprinkle shredded cheddar cheese over the mashed potatoes. 8. Bake in the preheated oven for 25-30 minutes, or until the cheese is melted and bubbly. 9. Let it cool for a few minutes before serving.', 'shepherds_pie.jpg', 1, 1, NOW(), NOW());

SELECT * FROM Recipes;

CREATE TABLE Users (
    User_id INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) UNIQUE NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Password VARCHAR(255) UNIQUE NOT NULL,
    Full_name VARCHAR(255), 
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    role ENUM('admin', 'user') DEFAULT 'user'
);

INSERT INTO Users (Username, Email, Password, Full_name, Created_at, Updated_at, role)
VALUES ('Soul_Eater', 'SolaceSimRo@yahoo.com', 'Galaxy', 'Solace-Simone', NOW(), NOW(), 'admin');

SELECT * FROM Users;