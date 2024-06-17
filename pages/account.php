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
                <li><a href="">About</a></li>
                <li class="logo"><a href="../index.php">infongopi.</a></li>
                <li><a href="cafe.php">List</a></li>
                <li><a href="../index.php">Contact</a></li>
            </ul>
    </header>
    <main>
        <div class="account-container">
            <h1>Account.</h1>
            <form>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                
                <button type="submit">Save Changes</button>
            </form>
            <button class="logout">Log out</button>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
