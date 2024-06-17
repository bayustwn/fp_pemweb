<?php
include "../util/isLogin.php";
include "../db/koneksi.php";

$cafe = "SELECT * FROM cafe";
$result = $conn->query($cafe);

if(isset($_POST['submit'])){
    $id = $_POST['submit'];
    header("Location: cafe-info.php?id='$id'");
    exit();
}

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
            <li><a href="../index.php">Home</a></li>
            <li><a href="./about.php">About</a></li>
            <li class="logo"><a href="../index.php">infongopi.</a></li>
            <li><a href="">List</a></li>
            <li><a href="../index.php#contact-container">Contact</a></li>
        </ul>
        <a href="./account.php"><img class="profile" src="../public/assets/profile-icon.svg" alt="profile"></a>
    </div>
    <form action="" method="GET" class="search-container">
        <div class="search">
            <img src="../public/assets/search-icon.svg" alt="seach-icon">
            <input type="text" name="cari" placeholder="Masukkan lokasi daerah" value="<?php echo htmlspecialchars($_GET['cari'] ?? '', ENT_QUOTES); ?>">
        </div>
        <button type="submit" class="cari">Cari</button>
    </form>
    <div class="tambah-container">
        <a href="tambahCafe.php"><button class="tambah">Tambah Cafe</button></a>
    </div>
    <div class="cafe-container">
    <?php
    if(isset($_GET['cari'])){
        $cafe2 = "SELECT * FROM cafe WHERE lokasi LIKE '%" . $conn->real_escape_string($_GET['cari']) . "%'";
        $res = $conn->query($cafe2);

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '
                <div class="cafe">
                    <div class="cafe-img">
                        <img src="'. htmlspecialchars($row['foto'] ?? "../public/cafe/placeholder.jpg") . '" alt="cafe">
                    </div>
                    <div class="cafe-desc">
                        <div class="title">
                            <h2>' . htmlspecialchars($row['nama']) . '</h2>
                            <div class="btn">
                                <a onClick="edit(\''.htmlspecialchars($row['id']).'\')"><img src="../public/assets/pencil-icon.svg" alt="edit"></a>
                                <a onClick="confirmDelete(\''.htmlspecialchars($row['id']).'\')"><img src="../public/assets/trash-icon.svg" alt="hapus"></a>
                            </div>
                        </div>
                        <p>' . htmlspecialchars($row['lokasi']) . '</p>
                        <p>' . htmlspecialchars($row['deskripsi']) . '</p>
                        <div class="time-container">
                            <img src="../public/assets/time.svg" alt="clock">
                            <p>' . htmlspecialchars($row['jam_buka']) . ' - ' . htmlspecialchars($row['jam_tutup']) . '</p>
                        </div>
                        <form action="" method="POST">
                            <input type="hidden" name="submit" value="'. htmlspecialchars($row['id']) .'">
                            <input class="baca" type="submit" value="Baca Selengkapnya">
                        </form>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="tidak">Tidak ada cafe ditemukan.</p>';
        }
    } else {
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="cafe">
                    <div class="cafe-img">
                        <img src="'. htmlspecialchars($row['foto'] ?? "../public/cafe/placeholder.jpg") . '" alt="cafe">
                    </div>
                    <div class="cafe-desc">
                        <div class="title">
                            <h2>' . htmlspecialchars($row['nama']) . '</h2>
                            <div class="btn">
                                <a onClick="edit(\''.htmlspecialchars($row['id']).'\')"><img src="../public/assets/pencil-icon.svg" alt="edit"></a>
                                <a onClick="confirmDelete(\''.htmlspecialchars($row['id']).'\')"><img src="../public/assets/trash-icon.svg" alt="hapus"></a>
                            </div>
                        </div>
                        <p>' . htmlspecialchars($row['lokasi']) . '</p>
                        <p>' . htmlspecialchars($row['deskripsi']) . '</p>
                        <div class="time-container">
                            <img src="../public/assets/time.svg" alt="clock">
                            <p>' . htmlspecialchars($row['jam_buka']) . ' - ' . htmlspecialchars($row['jam_tutup']) . '</p>
                        </div>
                        <form action="" method="POST">
                            <input type="hidden" name="submit" value="'. htmlspecialchars($row['id']) .'">
                            <input class="baca" type="submit" value="Baca Selengkapnya">
                        </form>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="tidak">Tidak ada cafe ditemukan.</p>';
        }
    }
    ?>
    </div>
    <script>
        function edit(id) {
            window.location.href = "/pages/editCafe.php?cafe=" + id ;
        }

        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus kafe ini?")) {
                window.location.href = "deleteCafe.php?id=" + id;
            }
        }
    </script>
</body>
</html>
