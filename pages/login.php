<?php
include "../db/koneksi.php";
session_start();

include "../util/isLogin.php";

if (isset($_SESSION['email'])) {
    header("Location: home.php");
    exit();
}else{
    if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $email;
                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php");
                $_SESSION['message'] = "Email atau password salah.";
                exit();
            }
        } else {
            header("Location: login.php");
            $_SESSION['message'] = "Email atau password salah.";
            exit();
        }
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
    <p>
        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </p>
    <form action="" method="post">
        <h1>Login</h1>
        <input type="email" name="email" required>
        <input type="password" name="pass" required>
        <button type="submit" name="submit" >Login</button>
    </form>
</body>
</html>