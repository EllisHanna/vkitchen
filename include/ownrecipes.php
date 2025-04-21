<?php

require_once 'connect.php';

$rid = isset($_GET['recipe']) ? intval($_GET['recipe']) : 0;
$sql = "SELECT * FROM recipes WHERE uid = $_SESSION[userid]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $desc = htmlspecialchars($row['description']);
        $type = htmlspecialchars($row['type']);
        $img = htmlspecialchars($row['image']);
        $rid = $row['rid'];

        echo "<div class='recipe-container myrecipes'>
                <div class='recipe-contents'>
                    <img src='./images/$img'/>
                    <div class='recipe-title'>
                        <h1 class='recipe-text'>$name</h1>
                        <span class='recipe-text'>$type</span>
                    </div>
                    <div class='recipe-flex'>
                        <p class='recipe-text desc'>$desc</p>
                        <a class='instructions-a' href='editrecipe.php?rid=$rid'>
                            <button class='instructions-button'>Edit Recipe</button>
                        </a>

                    </div>
                </div>
              </div>";
    }
} else {
    echo "<p class='lr-box'>No recipes found</p>";
}

$conn->close();