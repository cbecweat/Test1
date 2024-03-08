<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Image upload
    $image = $_FILES['image'];

    // Check if file is uploaded
    if ($image['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file.";
        exit();
    }

    // Check if the uploaded file is an image
    $image_info = getimagesize($image['tmp_name']);
    if (!$image_info) {
        echo "Uploaded file is not an image.";
        exit();
    }

    // Check if the uploaded image is a JPEG or PNG
    $allowed_types = ['image/jpeg', 'image/png'];
    if (!in_array($image_info['mime'], $allowed_types)) {
        echo "Only JPEG and PNG files are allowed.";
        exit();
    }

    // Move the uploaded file to the uploads directory
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);
    if (!move_uploaded_file($image["tmp_name"], $target_file)) {
        echo "Error moving uploaded file.";
        exit();
    }

    // Insert the blog post details into the database using prepared statement
    $stmt = $con->prepare("INSERT INTO blog_posts (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $target_file);
    if (!$stmt->execute()) {
        echo "Error inserting data into the database.";
        exit();
    }

    // Close statement and redirect
    $stmt->close();
    header("Location: blogs.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Upload Blog</title>
</head>
<body>
<div class="navbar">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="blogs.php" class="w3-bar-item w3-button">Blogs</a>
    <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
    <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
<h1>Upload Blog</h1>
<form action="upload_blog.php" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content" rows="5" required></textarea><br><br>
    <label for="image">Upload Image:</label><br>
    <input type="file" id="image" name="image" required><br><br>
    <input type="submit" name="submit" value="Upload">
</form>
</body>
</html>
