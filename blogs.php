// Insert the blog post details into the database
    $sql = "INSERT INTO blog_posts (title, content, image) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $title, $content, $image);
    mysqli_stmt_execute($stmt);
