<?php
if (!isset($_SESSION['email'])) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inter:wght@100..900&family=Italiana&family=Krona+One&family=Syncopate:wght@400;700&family=Tenor+Sans&display=swap" rel="stylesheet">
    <title>Info Ngopi</title>
</head>
<body>
    <div class="navbar">
        <ul class="menu">
            <li><a href="">Home</a></li>
            <li><a href="./pages/about.php">About</a></li>
            <li class="logo"><a href="">infongopi.</a></li>
            <li><a href="./pages/cafe.php">List</a></li>
            <li><a href="#contact-container">Contact</a></li>
        </ul>
        <?php
        
            if (!isset($_SESSION['email'])) {
                echo '
                <div class="auth-button">
                    <a href="./pages/register.php" class="button">Register</a>
                    <a href="./pages/login.php" class="button">Login</a>
                </div>';
            }else{
                echo '
                <a href="./pages/account.php"><img class="profile" src="./public/assets/profile-icon.svg" alt="profile"></a>';
            }

        ?>
    </div>
    <div class="content">
            <h1>Bingung ngopi bosq?
                tenang..</h1>
            <a class="hyperlink" href="./pages/cafe.php"><p>iki solusine ></p></a>
        </div>
        <div class="jargon-container">
            <p class="jargon">Tempatnya Info ngopi sesuai bugdet bosq</p>
        </div>
    </div>
    <div id="contact-container" class="contact-container">
        <div class="contact">
            <p>CONTACT</p>
        </div>
    </div>
</body>
</html>
