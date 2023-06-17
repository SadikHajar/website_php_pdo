<?php

session_start();


if (!isset($_SESSION['user_id'])) {

    header('Location: login.php');
    exit();
}
$pdo = new PDO('mysql:host=localhost; dbname=test_db', 'root', '');

$stmt = $pdo->prepare("SELECT *  FROM user WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Welcome
        <?php echo $user["name"]; ?>
    </h1>
    <a href="logout.php">Logout</a>
</body>

</html>