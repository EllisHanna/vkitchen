<?php
session_start();
if(isset($_SESSION['userid']));
else{
    header("location: ./home.php?error=notloggedin");
    exit();
}
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
        <div class="lr-container">
            <div class="recipe-box">
                <h1>Add A Recipe</h1>
                <form method="post" id="recipe-form" action="include/submitrecipe.php" enctype="multipart/form-data">
                    <input type="text" placeholder="Recipe Name" name="recipename">
                    <input class="description-box" type="text" placeholder="Description" name="description">
                    <?php include 'include/recipetype.php'?>
                    <input type="number" placeholder="Cooking Time" name="cooktime" id="cooktime" oninput="checkCookTime()">
                    <input class="description-box" type="text" placeholder="Ingredients" name="ingredients">
                    <input class="description-box" type="text" placeholder="Instructions" name="instructions">
                    <input type="file" placeholder="Upload An Image" name="image">
                    <button type="submit" name="submit">Add Recipe</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>