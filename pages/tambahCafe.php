<?php
include "../util/isLogin.php";
include "../db/koneksi.php";

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.html");
    exit();
}

function uuidv4()
{
    $data = random_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


$id = uuidv4();

if (isset($_POST['tambah'])) {
    
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

    $sql = "INSERT INTO cafe (id, nama, lokasi, instagram, deskripsi, pro, cons, jam_buka, jam_tutup, foto) VALUES 
            ('$id', '$nama', '$lokasi', '$instagram', '$deskripsi', '$pro', '$cons', '$jamBuka', '$jamTutup', '$foto')
            ON DUPLICATE KEY UPDATE
            nama = '$nama', lokasi = '$lokasi', instagram = '$instagram', deskripsi = '$deskripsi', pro = '$pro', cons = '$cons', jam_buka = '$jamBuka', jam_tutup = '$jamTutup', foto = '$foto'";

    if ($conn->query($sql) === TRUE) {
        header("Location: tambahCafe.php?cafe=$id&status=sukses");
        exit();
    } else {
        header("Location: tambahCafe.php?cafe=$id&status=gagal");
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
    <link rel="stylesheet" href="./style/tambahCafe.css">
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
            <h1>Tambah Cafe</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
                
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" required>
                
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram">
                
                <label for="desc">Deskripsi</label>
                <textarea name="desc" required></textarea>
                
                <label for="pro">Pro</label>
                <input type="text" name="pro">
                
                <label for="cons">Cons</label>
                <input type="text" name="cons">
                
                <label for="buka">Jam Buka</label>
                <input type="text" name="jamBuka">
                
                <label for="tutup">Jam Tutup</label>
                <input type="text" name="jamTutup">
                
                <label for="foto">Foto Cafe</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="" style="height:250px;object-fit:cover;">
                
                <button type="submit" name="tambah" value="tambah">Tambah Cafe</button>
            </form>
        </div>
    </main>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('status')) {
                if (urlParams.get('status') === 'sukses') {
                    alert('Berhasil menambah cafe.').then(() => {
                        window.location.href = 'cafeAdmin.php';
                    });
                } else if (urlParams.get('status') === 'gagal') {
                    alert('Terjadi kesalahan menambah cafe.').then(() => {
                        window.location.href = 'cafeAdmin.php';
                    });
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
