<?php
session_start();

if (!$_SESSION['email']) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p>Home</p>
    <p>Welcome <?php echo "abc" ?></p>
</body>
</html>
