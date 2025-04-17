<?php

require_once 'connect.php';

$sql = "SELECT * FROM recipes WHERE uid = $_SESSION[userid]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $desc = htmlspecialchars($row['description']);
        $type = htmlspecialchars($row['type']);
        $img = htmlspecialchars($row['image']);

        echo "<div class='recipe-container'>
                <div class='recipe-contents'>
                    <img src='./images/$img'/>
                    <div class='recipe-title'>
                        <h1 class='recipe-text'>$name</h1>
                        <span class='recipe-text'>$type</span>
                    </div>
                    <p class='recipe-text'>$desc</p>
                    <button class='instructions-button'>Edit Recipe</button>
                </div>
              </div>";
    }
} else {
    echo "<p class='lr-box'>No recipes found</p>";
}

$conn->close();