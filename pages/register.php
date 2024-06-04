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
        }
    ?>a</p>
<form action="" method="post">
    <input type="text" name="email">
    <input type="password" name="pass">
    <input type="password" name="confirm-pass" >
    <button type="submit" name="submit" >Register</button>
</form>
</body>
</html>

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
    if ($_POST['email'] && $_POST['password']) {
        if (isset($_POST["submit"])) {

            $email = $_POST["email"];
            $password = $_POST["pass"];
            $role = "user";
            $uuid = uuidv4();
    
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
    
            $email = mysqli_real_escape_string($conn, $email);
    
            $verif = "SELECT * FROM user WHERE email = '$email'";
            $verif2 = mysqli_query($conn, $verif);
    
            if ($verif2->num_rows == 0) {
                $regist = "INSERT INTO user (id,email, password, role) VALUES ('$uuid','$email', '$password_hash', '$role')";
                $res = mysqli_query($conn, $regist);
    
                if ($res) {
                    $_SESSION["email"] = $email;
                    $email = "";
                    $password = "";
                    header("Location: home.php");
                    exit();
                } 
            } else {
                $_SESSION['message'] = "Email Sudah Terdaftar !";
            }
        }
    }else{
        $_SESSION['message'] = "Email dan Passwrod tidak boleh kosong !";
    }
}
?>