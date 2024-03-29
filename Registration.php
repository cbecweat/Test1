<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$salt = bin2hex(random_bytes(16)); // Generate a random 16-byte salt
	$hashed_password = hash('sha256', $password . $salt); // Hash password with salt
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, salt, email, trn_date)
VALUES ('$username', '$hashed_password', '$salt', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";

	// Adds the php entitie that helps to prevent XSS attacks
	htmlentities($username, ENT_QUOTES, 'UTF-8');
	htmlentities($email, ENT_QUOTES, 'UTF-8');
	htmlentities($password, ENT_QUOTES, 'UTF-8');
		
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
