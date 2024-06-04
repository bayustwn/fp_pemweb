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
    header("Location: ../pages/home.html");
    exit();
} else {
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
                header("Location: ../pages/home.html");
            } else {
                echo "<script>console.log('error')</script>";
            }
        } else {
            echo "<script>alert('Email sudah terdaftar !')</script>";
        }
    }
}
?>
