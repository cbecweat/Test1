<?php
// Include your database connection file here
require('db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    // Image upload handling
    if(isset($_FILES["image"])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            if ($_FILES["image"]["size"] > 500000) { // Adjust file size limit as needed
                echo "Sorry, your file is too large.";
            } else {
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        // Insert the blog post details into the database
                        $sql = "INSERT INTO blog_posts (title, content, image) VALUES (?, ?, ?)";
                        $stmt = $con->prepare($sql); // Change $conn to $con here
                        $stmt->bind_param("sss", $title, $content, $targetFile);
                        $stmt->execute();
                        $stmt->close();
                        
                        // Redirect back to the dashboard page after processing
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            echo "File is not an image.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Blog</title>
</head>
<body>
    <h1>Upload Blog</h1>
    <form action="upload_blog.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="5" required></textarea><br><br>
        <label for="image">Upload Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
