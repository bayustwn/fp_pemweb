<?php
include "../util/isLogin.php";
include "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'update') {
        if (isset($_POST['email'], $_POST['password'], $_POST['confirm-password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];

            if ($password === $confirmPassword) {
                $currentEmail = $_SESSION['email'];
                
                $checkEmailQuery = "SELECT email FROM user WHERE email = '" . mysqli_real_escape_string($conn, $email) . "' AND email != '" . mysqli_real_escape_string($conn, $currentEmail) . "'";
                $checkEmailResult = $conn->query($checkEmailQuery);

                if ($checkEmailResult->num_rows > 0) {
                    header("Location: account.php?update=error-email");
                    echo "Email sudah digunakan !";
                    exit();
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
                    $query = "UPDATE user SET email = '" . mysqli_real_escape_string($conn, $email) . "', password = '" . mysqli_real_escape_string($conn, $hashedPassword) . "' WHERE email = '" . mysqli_real_escape_string($conn, $currentEmail) . "'";
                    
                    if ($conn->query($query)) {
                        $_SESSION['email'] = $email; 
                        header("Location: account.php?update=success");
                        exit();
                    } else {
                        echo "Error Update: " . $conn->error;
                    }
                }
            } else {
                echo "Password dan Konfirmasi Password tidak sama!";
            }
        } else {
            echo "Invalid input.";
        }
    } elseif ($action === 'logout') {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ./login.php");
        exit();
    }
}
?>
