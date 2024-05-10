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


$email = $password = "";
$email_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // check credentials
    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT id, email, password FROM users WHERE email = :email";

        if ($stmt = $pdo->prepare($sql)) {
         
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

           
            $param_email = $email;

            if ($stmt->execute()) {
            
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        if (password_verify($password, $hashed_password)) {
                          

                         
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // send user back to main page
                            header("location: mainpage.php");
                            exit;
                        } else {
                            // Password is not valid, display error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    // Email not found, display error message
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close the statement
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
                <li><a href="Signup.php">Signup</a><li>
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

       
        input[type="email"], input[type="password"], input[type="submit"] {
            display: block;
            margin: 0 auto; 
            width: 200px; 
            margin-bottom: 10px; 
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