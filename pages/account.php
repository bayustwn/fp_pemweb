<?php
include "../util/isLogin.php";
include "../db/koneksi.php";

$email = $_SESSION['email'];
$query = "SELECT * FROM user WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link rel="stylesheet" href="./style/account.css">
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
    </header>
    <main>
        <div class="account-container">
        <?php
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            echo '
            <h1>Account</h1>
            <form action="user_form.php" method="POST">
                <label for="email">Email Address</label>
                <input type="email" value="'. htmlspecialchars($user['email'], ENT_QUOTES) .'" id="email" name="email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                
                <button type="submit" name="action" value="update">Save Changes</button>
            </form>
            <form action="user_form.php" method="POST">
                <button name="action" value="logout" type="submit" class="logout">Log out</button>
            </form>
            ';
        } else {
            echo '<p>User not found.</p>';
        }
        ?>
    </main>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('update') && urlParams.get('update') === 'success') {
                alert('Berhasil mengedit profile !');
            }else if(urlParams.has('update') && urlParams.get('update') === 'error-email'){
                alert('Email Sudah ada. !');
            }
        };
    </script>
</body>
</html>
