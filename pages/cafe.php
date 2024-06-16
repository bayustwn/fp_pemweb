<?php
include "../util/isLogin.php";
include "../db/koneksi.php";

$cafe = "SELECT * FROM cafe";
$result = $conn->query($cafe);

?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inter:wght@100..900&family=Italiana&family=Krona+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/cafe.css">
    <title>Cafe</title>
</head>
<body>
    <div class="navbar">
        <ul class="menu">
            <li><a href="../index.html">Home</a></li>
            <li><a href="./about.php">About</a></li>
            <li class="logo"><a href="../index.html">infongopi.</a></li>
            <li><a href="">List</a></li>
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
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
    <div class="cafe">
        <div class="cafe-img">
            <img src="../public/assets/' . htmlspecialchars($row['foto']) . '" alt="cafe">
        </div>
        <div class="cafe-desc">
            <h2>' . htmlspecialchars($row['nama']) . '</h2>
            <p>' . htmlspecialchars($row['lokasi']) . '</p>
            <p>' . htmlspecialchars($row['deskripsi']) . '</p>
            <div class="time-container">
                <img src="../public/assets/time.svg" alt="clock">
                <p>' . htmlspecialchars("belum ada") . '</p>
            </div>
            <button>
                Baca Selengkapnya
            </button>
        </div>
    </div>';
        }
    ?>
        <!-- <div class="cafe">
            <div class="cafe-img">
                <img src="../public/assets/sample.jpg" alt="sample">
            </div>
            <div class="cafe-desc">
                <h2>PatDua Coffe And Eatery</h2>
                <p>Jl.Rungkut Madya no.203</p>
                <p>Lorem Ipsum Dolor Sit Amet. Amet Mase</p>
                <div class="time-container">
                    <img src="../public/assets/time.svg" alt="clock">
                    <p>10-12pm</p>
                </div>
                <button>
                    Baca Selengkapnya
                </button>
            </div>
        </div> -->
    </div>
</body>
</html>

