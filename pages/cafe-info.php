<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pat.Rungtal Coffee & Eatery</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="navigation">
  <a href="#">Home</a>
  <a href="#">About</a>
  <a href="#">Menu</a>
  <a href="#">List</a>
  <a href="#">Contact</a>
</nav>

<div class="logo">
  <h1>Pat.Rungtal Coffee & Eatery</h1>
  <p>JI. Rungkut Madya No.203</p>
</div>

<div class="shop-image">
  <!-- Image of the coffee shop -->
  <img src="coffee-shop.jpg" alt="Coffee Shop Interior">
</div>

<div class="info-sections">
  <section id="jam-buka">
    <h2>Jam Buka</h2>
    <!-- Content for Jam Buka -->
  </section>
  <section id="serving">
    <h2>Serving</h2>
    <!-- Content for Serving -->
  </section>
  <section id="service">
    <h2>Service</h2>
    <!-- Content for Service -->
  </section>
</div>

<!-- Comments Section -->
<div class="comments-section">
  <h2>User Comments</h2>
  <div id="user-comments-list">
    <!-- PHP code to display comments from database will go here -->
  </div>
  
  <div class="comment-form">
    <form action="submit_comment.php" method="post"> 
      <label for="user-comment">Leave a comment:</label><br/>
      <textarea id="user-comment" name="user_comment" rows="4"></textarea><br/>
      <input type="submit" value="Submit Comment"/>
    </form> 
  </div>
</div>

</body>
</html>
