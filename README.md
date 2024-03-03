if($result1 && mysqli_num_rows($result1) == 1) {
        // Update the password for the given username and email
        $query2 = "UPDATE users SET password = '$hashed_password' WHERE username = '$username' AND email = '$email'";    
        $result2 = mysqli_query($con, $query2); 
        
        if ($result2) {
            echo "<h3>Password has been reset successfully.</h3>";
        } else {
            echo "<h3>Failed to reset password. Please try again.</h3>";
        }
    } else {
        echo "<h3>Invalid username, email, or token.</h3>";
    }
}
