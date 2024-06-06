<?php
include "../db/koneksi.php";
session_start();

if (isset($_SESSION['email'])) {
    header("Location: cafe.php");
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
                header("Location: cafe.php");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/login.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="pass" placeholder="Password" required>
        <button type="submit" name="submit" >Login</button>
    </form>
    <?php
if (isset($_SESSION['message'])) {
    $msg = htmlspecialchars($_SESSION['message']);
    echo "<p class='message'>$msg</p>";
    unset($_SESSION['message']);
}
?>
</div>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var messageElement = document.querySelector(".message");
            var formElements = document.querySelectorAll("input[name='email'], input[name='pass'], input[name='confirm-pass']");

            if (messageElement) {
                formElements.forEach(function(element) {
                    element.addEventListener("focus", function() {
                        messageElement.style.display = "none";
                    });
                });
            }
        });
    </script>
</body>
</html>