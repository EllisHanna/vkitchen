<?php
session_start(); 
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

    <?php include 'include/navbar.php';?>

    <section class="feed-section">
        <div id="feed-container" class="instructions">
                <?php include 'include/instructioninfo.php'; ?>
        </div>
    </section>
</body>
</html>