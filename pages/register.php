<?php
include "../db/koneksi.php";
session_start();

function uuidv4()
{
    $data = random_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if (isset($_SESSION['email'])) {
    header("Location: home.php");
    exit();
} else {
    if (isset($_POST["submit"])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confirmPass = $_POST['confirm-pass'];
        
        if ($email != "" && $pass != "" && $confirmPass != "") {
            if ($pass !== $confirmPass) {
                $_SESSION['message'] = "Password tidak cocok dengan konfirmasi.";
                exit();
            }
            
            $role = "user";
            $uuid = uuidv4();

            $password_hash = password_hash($pass, PASSWORD_BCRYPT);

            $email = mysqli_real_escape_string($conn, $email);

            $verif = "SELECT * FROM user WHERE email = '$email'";
            $verif2 = mysqli_query($conn, $verif);

            if ($verif2->num_rows > 0) {
                header("Location: register.php");
                $_SESSION['message'] = "Email Sudah Terdaftar!";
                exit();
            } else {
                $regist = "INSERT INTO user (id,email, password, role) VALUES ('$uuid','$email', '$password_hash', '$role')";
                $res = mysqli_query($conn, $regist);

                if ($res) {
                    $_SESSION["email"] = $email;
                    $email = "";
                    $pass = "";
                    $confirmPass = "";
                    header("Location: home.php");
                    exit();
                } 
            }
        } else {
            header("Location: register.php");
            $_SESSION['message'] = "Form tidak boleh kosong!";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <p>
    <?php 
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']); 
        }
    ?></p>
<form action="" method="post">
    <input type="text" name="email" required>
    <input type="password" name="pass" required>
    <input type="password" name="confirm-pass" required>
    <button type="submit" name="submit">Register</button>
</form>
</body>
</html>
