<?php
include "../util/isLogin.php";
include "../db/koneksi.php";

$cafe = "SELECT * FROM cafe";
$result = $conn->query($cafe);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/cafe.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inter:wght@100..900&family=Italiana&family=Krona+One&display=swap" rel="stylesheet">
    <title>Cafe</title>
</head>
<body>
<div class="navbar">
        <ul class="menu">
            <li><a href="../index.html">Home</a></li>
            <li><a href="#">About</a></li>
            <li class="logo"><a href="#">infongopi.</a></li>
            <li><a href="#">List</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <img class="profile" src="../public/assets/profile-icon.svg" alt="profile">
    </div>
    <div class="search-container">
        <div class="search">
            <img src="../public/assets/search-icon.svg" alt="seach-icon">
            <input type="text" placeholder="Masukkan lokasi daerah anda">
        </div>
    </div>
    <div class="cafe-container">
        <div class="info">
        <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p> Nama : " . $row["nama"] . "</p>";
        echo "<p> Deskripsi : " . $row["deskripsi"] . "</p>";
        echo "<p> Pro : " . $row["pro"] . "</p>";
        echo "<p> Cons : " . $row["cons"] . "</p>";
        echo "<p> Lokasi : " . $row["lokasi"] . "</p>";
    }
} else {
    echo "<p>Tidak ada cafe<p>";
}
?>
        </div>
    </div>
</body>
</html>

