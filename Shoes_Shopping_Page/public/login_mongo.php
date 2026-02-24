<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$db = require '../config/mongo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $db->users->findOne(['email' => $email]);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = (string)$user['_id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: dashboard.php");
        exit();

    } else {
        echo "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="login.css">
</head>
<body>
    <form method="POST">
        Email: <input type="email" name="email"><br><br>
        Password: <input type="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>