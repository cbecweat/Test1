<?php
// Include your database connection file here
require('db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    // Image upload handling
    $targetDir = "uploads/"; // Specify your upload directory
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
        } else {
            // Check file size
            if ($_FILES["image"]["size"] > 500000) { // Adjust file size limit as needed
                echo "Sorry, your file is too large.";
            } else {
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                } else {
                    // Move uploaded file to target directory
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
        }
    } else {
        echo "File is not an image.";
    }
}
?>
