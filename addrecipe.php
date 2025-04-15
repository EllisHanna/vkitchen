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
    <nav>
        <img src="./images/logo.png" id="logo">
        <ul id="nav-list">
            <li class="nav-element"><a href="home.php">Home</a></li>
            <li class="nav-element"><a href="myrecipes.php">My Recipes</a></li>
            <li class="nav-element"><a class="active-element">Add Recipe</a></li>
            <li class="nav-element"><a href="#">Log Out</a></li>
        </ul>
    </nav>

    <section class="feed-section">
        <div class="lr-container">
            <div class="lr-box recipe-box">
                <h1>Add A Recipe</h1>
                <form method="post" id="recipe-form" action="submitrecipe.php">
                    <input type="text" placeholder="Recipe Name">
                    <input class="description-box" type="text" placeholder="Description">
                    <?php include 'include/recipetype.php'?>
                    <input type="number" placeholder="Cooking Time">
                    <input class="description-box" type="text" placeholder="Ingredients">
                    <input class="description-box" type="text" placeholder="Instructions">
                    <input type="file" placeholder="Upload An Image">
                    <button type="submit">Add Recipe</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>