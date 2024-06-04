<?php
include "../db/koneksi.php";
session_start();

$email = $_POST["email"];
$pass = $_POST["password"];

$login = "SELECT * FROM user WHERE email = $email AND pass = $pass";
$res = mysqli_query(login);


?>