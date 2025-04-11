<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Nom</title>
</head>
<body>
    <div class="lr-container">
        <div class="lr-box">
            <h1>Login</h1>
            <form method="post" action="login.php">
                <input type="email" placeholder="Email" name="email"><br>
                <input type="password" placeholder="Password" name="password"><br>
                <input type="password" placeholder="Confirm Password" name="confirmpassword"><br>
                <button type="submit">Sign Up</button>
                <p>Dont have an account? <a class="link" href="signup.php">Sign up</a></p>
            </form>
        </div>
    </div>
</body>
</html>