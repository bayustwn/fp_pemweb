<?php
include "../db/koneksi.php";
include "../util/isLogin.php";

function uuidv4()
{
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function uuidv4Menu()
{
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


$id = isset($_GET['id']) ? ($_GET['id']) : '';

$query = "SELECT * FROM cafe WHERE id=$id";
$result = $conn->query($query);

$komentarQuery = "SELECT * FROM komentar WHERE cafe=$id";
$komentar_res = $conn->query($komentarQuery);

if ($result && $result->num_rows > 0) {
    $cafe = $result->fetch_assoc();
} else {
    echo "Cafe tidak ditemukan.";
    exit();
}

function getUserNameById($userId, $conn) {
    $safeUserId = $conn->real_escape_string($userId);
    $query = "SELECT email FROM user WHERE id = '$safeUserId'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user['email'];
    }
    return '';
}

function getUserIDbyEmail($email, $conn) {
    $safeEmail = $conn->real_escape_string($email);
    $query = "SELECT id FROM user WHERE email = '$safeEmail'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user['id'];
    }
    return '';
}

$uuid = uuidv4();
$userId = getUserIDbyEmail($_SESSION['email'], $conn);
$cafeId = $id;

if (isset($_POST['submit'])) {
    $komentar = $conn->real_escape_string($_POST['comment']);

    if (!empty($komentar)) {
        $add_komen = "INSERT INTO komentar (id, id_user, komentar, cafe) VALUES ('$uuid', '$userId', '$komentar', $cafeId)";
        $res = $conn->query($add_komen);

        if ($res) {
            header("Location: cafe-info.php?id=$cafeId&status=sukses");
            exit();
        } else {
            header("Location: cafe-info.php?id=$cafeId&status=gagal");
            exit();
        }
    } else {
        echo "Komentar tidak boleh kosong.";
    }
}

$menu = "SELECT * FROM menu WHERE cafe=$cafeId";
$menu_res = $conn->query($menu);

if (isset($_POST['tambah'])) {
    $nama_menu = $_POST['nama-menu'];
    $harga = $_POST['harga-menu'];

    $id_menu = uuidv4Menu();

    $add_menu_query = "INSERT INTO menu (id,nama,harga,cafe) VALUES ('$id_menu','$nama_menu','$harga',$cafeId)";
    
    if ($conn->query($add_menu_query) === TRUE) {
        header("Location: cafe-info.php?id=$cafeId");
        exit();
    } else {
        header("Location: cafe-info.php?id=$cafeId");
        exit();
    }
}

if (isset($_SESSION['role']) && $_SESSION['role'] === "admin" && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['menu_id'])) {
    $menu_id = $conn->real_escape_string($_GET['menu_id']);
    $delete_menu_query = "DELETE FROM menu WHERE id = '$menu_id'";
    if ($conn->query($delete_menu_query) === TRUE) {
        header("Location: cafe-info.php?id=$cafeId");
        exit();
    } else {
        echo "Error: " . $conn->error;
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($cafe['nama'], ENT_QUOTES, 'UTF-8'); ?></title>
<link rel="stylesheet" href="./style/cafe-info.css">
</head>
<body>

<div class="navbar">
    <ul class="menu">
        <li><a href="../index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li class="logo"><a href="../index.php">infongopi.</a></li>
        <li><a href="cafe.php">List</a></li>
        <li><a href="../index.php">Contact</a></li>
    </ul>
    <a href="./account.php"><img class="profile" src="../public/assets/profile-icon.svg" alt="profile"></a>
</div>

<div class="info-container">
  <div class="info">
    <h1><?php echo htmlspecialchars($cafe['nama'], ENT_QUOTES, 'UTF-8'); ?></h1>
    <p><?php echo htmlspecialchars($cafe['lokasi'], ENT_QUOTES, 'UTF-8'); ?></p>
    <div class="instagram-container">
      <img src="../public/assets/instagram-icon.svg" alt="ig">
      <p><?php echo htmlspecialchars($cafe['instagram'] ?? 'Belum ada', ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="time-container">
        <img src="../public/assets/time.svg" alt="clock">
        <p style="margin: 0px;"><?php echo htmlspecialchars($cafe['jam_buka'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($cafe['jam_tutup'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <p style="margin-top: 30px;"><strong>Pro: </strong><?php echo htmlspecialchars($cafe['pro'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Cons: </strong><?php echo htmlspecialchars($cafe['cons'], ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
  <div class="gambar">
    <img src="<?php echo htmlspecialchars($cafe['foto'] ?? "../public/cafe/placeholder.jpg", ENT_QUOTES, 'UTF-8'); ?>" alt="cafe">
  </div>
</div>

<div class="menu-container">
  <h1>Menu Cafe</h1>
  <div class="menu-cafe">
    <?php
        while($menus = mysqli_fetch_assoc($menu_res)){
            echo '
    <div class="menu-item">
        <h3>' . htmlspecialchars($menus['nama']) . '</h3>
        <p>' . htmlspecialchars($menus['harga']) . '</p>';
    
        if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
            echo '
                <a href="cafe-info.php?id=' . $cafeId . '&action=delete&menu_id=' . $menus['id'] . '">
                    <img style="width:20px;" src="../public/assets/remove-icon.svg" alt="remove">
                </a>
            ';
        }        
    
    echo '
    </div>';
        }
    ?>
  </div>
  <?php
    if ($_POST['role']="admin") {
        echo '<form action="" method="POST" class="tambah-menu">
        <input type="text" name="nama-menu" placeholder="nama">
        <input type="text" name="harga-menu" placeholder="harga">
        <input type="submit" value="Tambah" name="tambah">
      </form>';
    }
  ?>
</div>

<div class="comment-container">
  <h1>Komentar</h1>
  <div class="komentar">
    <?php
    while ($komen = $komentar_res->fetch_assoc()) {
        echo '<p><strong>' . htmlspecialchars(getUserNameById($komen['id_user'], $conn), ENT_QUOTES, 'UTF-8') . ':</strong> ' . htmlspecialchars($komen['komentar'], ENT_QUOTES, 'UTF-8') . '</p>';
    }
    ?>
  </div>
  <form action="" class="input-comment" method="POST">
      
        <input type="text" name="comment" placeholder="Tinggalkan Komentar Anda: ">
        <input type="submit" value="komentar" name="submit">
      
  </form>
</div>

<script>
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('status')) {
            if (urlParams.get('status') === 'sukses') {
                alert('Berhasil menambah komentar.');
            } else if (urlParams.get('status') === 'gagal') {
                alert('Terjadi kesalahan. Gagal menambah komentar.');
            }
        }
    };
</script>

</body>
</html>
