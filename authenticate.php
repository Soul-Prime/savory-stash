<?php
require_once 'login.php';
require_once 'Recipecollection';

function sanitize($str)
{
    return htmlentities($str);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = isset($_POST['email']) ? sanitize($pdo, $_POST['email']) : '';
    $password = isset($_POST['password']) ? sanitize($pdo, $_POST['password']) : '';


}
?>