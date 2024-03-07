// Generate a random salt
    $salt = bin2hex(random_bytes(16)); // 16 bytes (128 bits) salt

    // Combine salt with the password
    $password_with_salt = $password . $salt;

    // Hash the password with salt
    $hashed_password = hash('sha256', $password_with_salt);

    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT INTO `users` (username, password, salt, email, trn_date)
            VALUES ('$username', '$hashed_password', '$salt', '$email', '$trn_date')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
