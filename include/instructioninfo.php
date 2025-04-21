<?php
require_once 'connect.php';

$rid = isset($_GET['instructions']) ? intval($_GET['instructions']) : 0;
$recipe = null;

if ($rid > 0) {
    $stmt = $conn->prepare("SELECT * FROM recipes WHERE rid = ?");
    $stmt->bind_param("i", $rid);
    $stmt->execute();
    $result = $stmt->get_result();
    $recipe = $result->fetch_assoc();
    $stmt->close();
}

if ($recipe){
    $name = htmlspecialchars($recipe['name']);
    $desc = nl2br(htmlspecialchars($recipe['description']));
    $img = htmlspecialchars($recipe['image']);
    $time = htmlspecialchars($recipe['Cookingtime']);
    $ingredients = nl2br(htmlspecialchars($recipe['ingredients']));
    $instructions = nl2br(htmlspecialchars($recipe['instructions']));

    echo "<div class='recipe-box'>
            <h1>$name</h1>
            <img class='instruction-img' src='./images/$img'/>
            <p>Cooking Time: $time minutes</p>
            <p>$ingredients</p>
            <p>$instructions</p>
            <a class='instructions-a' href='home.php'>
                <button class='instructions-button'>Back to recipes</button>
            </a>
        </div>";
}
else{
    echo "<p class='lr-box'>Recipe not found.</p>";
}

$conn->close();