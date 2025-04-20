<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Nom</title>
</head>
<body>
    <div class="lr-container">
        <div class="lr-box">
            <h1>Register</h1>
            <form method="post" action="include/signup.php">
                <input type="username" placeholder="Username" name="username"><br>
                <input type="email" placeholder="Email" name="email"><br>
                <input type="password" placeholder="Password" name="password"><br>
                <input type="password" placeholder="Confirm Password" name="confirmpassword"><br>
                <button type="submit" name="submit">Sign Up</button>
                <p>Already have an account? <a class="link" href="login.php">Sign In</a></p>
                <a href="home.php" class="link">Continue As Guest</a>
            </form>
        </div>
    </div>
</body>
</html>