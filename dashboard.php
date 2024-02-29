<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
 
       <a href="index.php" class="w3-bar-item w3-button">Index</a>
	   <a href="blogs.php" class="nav-link">Blogs</a>
	  <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
	<a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
</body>
</html>

<?php
// Include authentication check and database connection
include("auth.php");
require('db.php');

// Query to retrieve blogs from the database
$sql = "SELECT * FROM blog_posts";
$result = $con->query($sql); // Change $conn to $con here

// Check if there are any blogs
if ($result->num_rows > 0) {
    // Output each blog
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No blogs found.";
}
?>

