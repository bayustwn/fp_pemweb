<?php
include "../db/koneksi.php";
include "../util/isLogin.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';

$query = "SELECT * FROM cafe WHERE id=" . $id;
$result=$conn->query($query);

if ($result && $result->num_rows > 0) {
  $cafe = $result->fetch_assoc();
} else {
  echo "Cafe tidak ditemukan.";
  exit();
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
            <li><a href="./about.php">About</a></li>
            <li class="logo"><a href="../index.php">infongopi.</a></li>
            <li><a href="">List</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <a href="./account.php"><img class="profile" src="../public/assets/profile-icon.svg" alt="profile"></a>
    </div>

<div class="info-container">
  <div class="info">
    <h1><?php echo htmlspecialchars($cafe['nama'], ENT_QUOTES, 'UTF-8'); ?></h1>
    <p><?php echo htmlspecialchars($cafe['lokasi'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php
      echo '
      <div class="time-container">
        <img src="../public/assets/time.svg" alt="clock">
        <p style="margin: 0px;">' . htmlspecialchars($cafe['jam_buka']) . ' - ' . htmlspecialchars($cafe['jam_tutup']) . '</p>
      </div>
      ';
    ?>
    <p style="margin-top: 30px;"><strong>Pro : </strong><?php echo htmlspecialchars($cafe['pro'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Cons : </strong> <?php echo htmlspecialchars($cafe['cons'], ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
  <div class="gambar">
    <?php
      echo '<img src="../public/cafe/' . htmlspecialchars($row['foto'] ?? "placeholder.jpg") . '" alt="cafe">';
    ?>
  </div>
</div>

<div class="menu-container">
  <h1>Menu Cafe</h1>
  <div class="menu-cafe">
    <div class="menu-item">
    <h3>Nama Menu</h3>
    <p>Rp.2000</p>
    </div>
    <div class="menu-item">
    <h3>Nama Menu</h3>
    <p>Rp.2000</p>
    </div>
  </div>
</div>

<div class="comment-container">
  <h1>Komentar user</h1>
  <div class="komentar">
    <p>komen 1</p>
    <p>komen 1</p>
    <p>komen 1</p>
    <p>komen 1</p>
    <p>komen 1</p>
  </div>
  <fprm class="input-comment">
    <input type="text" name="comment" placeholder="Tinggalkan Komentar Anda : ">
    <input type="submit" value="komentar" name="submit">
</form>
</div>

</body>
</html>
