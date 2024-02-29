<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Blog</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php" class="w3-bar-item w3-button">Index</a>
	<a href="blogs.php" class="nav-link">Blogs</a>
	<a href="profile.php" class="w3-bar-item w3-button">Profile</a>
	<a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>

<style>


/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>

<div class="container">

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
</div>
</body>
</html>
