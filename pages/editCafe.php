<?php
include "../util/isLogin.php";
include "../db/koneksi.php";

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.html");
    exit();
}

$id = isset($_GET['cafe']) ? $_GET['cafe'] : '';

$cafe = "SELECT * FROM cafe WHERE id='$id'";
$result = $conn->query($cafe);

if (isset($_POST['update'])) {
    
    $namaFile = $_FILES['foto']['name'];
    $namaSementara = $_FILES['foto']['tmp_name'];

    $dirUpload = "../public/cafe/";
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
    $foto = $dirUpload . $namaFile;

    $nama = $_POST['nama'];
    $lokasi = $_POST['alamat'];
    $instagram = $_POST['instagram'];
    $deskripsi = $_POST['desc'];
    $pro = $_POST['pro'];
    $cons = $_POST['cons'];
    $jamBuka = $_POST['jamBuka'];
    $jamTutup = $_POST['jamTutup'];

    $sql = "UPDATE cafe SET 
            nama = '$nama',
            lokasi = '$lokasi',
            instagram = '$instagram',
            deskripsi = '$deskripsi',
            pro = '$pro',
            cons = '$cons',
            jam_buka = '$jamBuka',
            jam_tutup = '$jamTutup',
            foto = '$foto'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: editCafe.php?cafe=$id&status=sukses");
        exit();
    } else {
        header("Location: editCafe.php?cafe=$id&status=gagal");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cafe</title>
    <link rel="stylesheet" href="./style/editCafe.css">
</head>
<body>
    <header>
        <div class="navbar">
            <ul class="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li class="logo"><a href="../index.php">infongopi.</a></li>
                <li><a href="cafe.php">List</a></li>
                <li><a href="../index.php">Contact</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="account-container">
        <?php
        if (mysqli_num_rows($result) == 1) {
            $cafe = mysqli_fetch_assoc($result);
            echo '
            <h1>Edit Cafe</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="nama">Nama</label>
                <input type="text" value="' . htmlspecialchars($cafe['nama'], ENT_QUOTES) . '" id="nama" name="nama" required>
                
                <label for="alamat">Alamat</label>
                <input type="text" value="' . htmlspecialchars($cafe['lokasi'], ENT_QUOTES) . '" name="alamat" required>
                
                <label for="instagram">Instagram</label>
                <input type="text" value="' . htmlspecialchars($cafe['instagram'] ?? '') . '" name="instagram">
                
                <label for="desc">Deskripsi</label>
                <textarea name="desc" required>' . htmlspecialchars($cafe['deskripsi']) . '</textarea>
                
                <label for="pro">Pro</label>
                <input type="text" value="' . htmlspecialchars($cafe['pro'] ?? '') . '" name="pro">
                
                <label for="cons">Cons</label>
                <input type="text" value="' . htmlspecialchars($cafe['cons'] ?? '') . '" name="cons">
                
                <label for="buka">Jam Buka</label>
                <input type="text" value="' . htmlspecialchars($cafe['jam_buka'] ?? '') . '" name="jamBuka">
                
                <label for="tutup">Jam Tutup</label>
                <input type="text" value="' . htmlspecialchars($cafe['jam_tutup'] ?? '') . '" name="jamTutup">
                
                <label for="foto">Foto Cafe</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="' . htmlspecialchars($cafe['foto'] ?? '') . '" style="height:250px;object-fit:cover;">
                
                <button type="submit" name="update" value="update">Simpan Perubahan</button>
            </form>
            ';
        } else {
            echo '<p>User not found.</p>';
        }
        ?>
        </div>
    </main>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('status')) {
                if (urlParams.get('status') === 'sukses') {
                    alert('Berhasil mengubah info cafe.');
                } else if (urlParams.get('status') === 'gagal') {
                    alert('Terjadi kesalahan mengubah info cafe.');
                }
            }
        };
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
