<?php
include "../db/koneksi.php";
session_start();

$email = $_POST["email"];
$pass = $_POST["password"];

$login = "SELECT * FROM user WHERE email = $email AND pass = $pass";
$res = mysqli_query($conn,$login);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../logic/login.php" method="post">
        <h1>Login</h1>
        <input type="email" name="email" id="email">
        <input type="password" name="password" id="pass">
        <button type="submit">Login</button>
    </form>
</body>
</html>