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

// sanitization
function sanitize($str)
{
    return htmlentities($str);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST['email']) ? sanitize($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $stmt = $pdo->prepare("SELECT * FROM Users WHERE Email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   // user and password acutally exist
    if ($user && password_verify($password, $user['Password'])) {
        // Start session and set user data
        session_start();
        $_SESSION['User_id'] = $user['User_id'];
        $_SESSION['Username'] = $user['Username'];

        // Redirect to FoodForums page
        header("Location: FoodForums.php");
        exit;
    } else {
        // Redirect back to login page with error message
        header("Location: login.php?error=invalid_credentials");
        exit;
    }
}
?>