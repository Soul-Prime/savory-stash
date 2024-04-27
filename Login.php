<?php
$primaryColor = '#98FB98'; 
$secondaryColor = '#00FF7F'; 
$tertiaryColor = '#2E8B57';
$borderTopColor = '#FF5733'; // Red
$borderRightColor = '#F0E68C'; // Khaki
$borderBottomColor = '#4682B4'; // Steel Blue
$borderLeftColor = '#7FFF00'; // Chartreuse 

session_start();

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

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT id, email, password FROM users WHERE email = :email";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Check if email exists, if yes then verify password
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to main page
                            header("location: mainpage.php");
                            exit;
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    // Email not found, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>
    <header>
   
        <nav>
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="Details.php">Details</a></li>
                <li><a href="FoodForums.php">Forms</a></li>
                <li><a href="Summary.php">Summary</a></li>
              
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

<div class="login-form">
    <center><h2>Please Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p><?php echo $login_err; ?></p>
    </form>
</div>