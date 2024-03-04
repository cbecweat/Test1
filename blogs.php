// Fetch the hashed password, salt, and token from the database
$query1 = "SELECT u.password, u.salt, t.token FROM users u JOIN tokens t ON u.username = t.username WHERE u.username = '$username' AND u.email = '$email'";
