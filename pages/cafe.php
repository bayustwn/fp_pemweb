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
    <title>Cafe</title>
</head>
<body>
    <h1>List Cafe</h1>
    <div class="cafe-container">
        <div class="info">
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
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

