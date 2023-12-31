<?php

session_start();
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $pdo = new PDO('mysql:host=localhost; dbname=test_db', 'root', '');

    $stmt = $pdo->prepare("INSERT INTO user (name, phone, email, password) VALUES(?, ?, ?, ?)");
    $stmt->execute([$name, $phone, $email, password_hash($password, PASSWORD_DEFAULT)]);
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Website</title>
</head>

<body>
    <div class="center">
        <h1>Registration</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="name" required>
                <span></span>
                <label>Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="phone" required>
                <span></span>
                <label>Phone</label>
            </div>
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" name="submit" value="Create account">
            <div class="signup_link">
                Already have an account? <a href="login.php">Sign In</a>
            </div>
        </form>
    </div>
</body>

</html>