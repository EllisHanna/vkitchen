<?php
session_start();
if (!isset($_GET['rid'])) {
    header("location: ./myrecipes.php?error=missingrid");
    exit();
}

require_once 'include/connect.php';

$rid = intval($_GET['rid']);
$stmt = $conn->prepare("SELECT * FROM recipes WHERE rid = ? AND uid = ?");
$stmt->bind_param("ii", $rid, $_SESSION['userid']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("location: ./myrecipes.php?error=notfound");
    exit();
}

$row = $result->fetch_assoc();
$name = htmlspecialchars($row['name']);
$desc = htmlspecialchars($row['description']);
$type = htmlspecialchars($row['type']);
$cooktime = htmlspecialchars($row['Cookingtime']);
$ingredients = htmlspecialchars($row['ingredients']);
$instructions = htmlspecialchars($row['instructions']);
$image = htmlspecialchars($row['image']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Edit Recipe</title>
</head>
<body>

    <?php include 'include/navbar.php';?>

    <section class="feed-section">
        <div class="lr-container">
            <div class="recipe-box">
                <h1>Edit Recipe</h1>
                <form method="post" action="include/updaterecipe.php" enctype="multipart/form-data">
                <input type="hidden" name="rid" value="<?= $rid ?>">
                    <input type="text" placeholder="Recipe Name" name="recipename" value="<?= $name ?>">
                    <input class="description-box" type="text" placeholder="Description" name="description" value="<?= $desc ?>">
                    <?php include 'include/recipetype.php'; ?>
                    <input id="cooktime" type="number" placeholder="Cooking Time" name="cooktime" value="<?= $cooktime ?>" oninput="checkCookTime()">
                    <input class="description-box" type="text" placeholder="Ingredients" name="ingredients" value="<?= $ingredients ?>">
                    <input class="description-box" type="text" placeholder="Instructions" name="instructions" value="<?= $instructions ?>">
                    <input type="file" name="image">
                    <button type="submit" name="submit">Update Recipe</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
