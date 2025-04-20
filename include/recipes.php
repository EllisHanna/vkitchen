<?php

require_once 'connect.php';
require_once 'functions.php';

$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $desc = htmlspecialchars($row['description']);
        $type = htmlspecialchars($row['type']);
        $img = htmlspecialchars($row['image']);
        $uid = $row['uid'];

        $owner = getOwner($conn, $uid);

        echo "<div class='recipe-container'>
                <span class='owner-tag'>$owner</span>
                <div class='recipe-contents'>
                    <img src='./images/$img'/>
                    <div class='recipe-title'>
                        <h1 class='recipe-text'>$name</h1>
                        <span class='recipe-text'>$type</span>
                    </div>
                    <div class='recipe-flex'>
                        <p class='recipe-text desc'>$desc</p>
                        <button class='instructions-button'>View Instructions</button>
                    </div>
                </div>
              </div>";
    }
} else {
    echo "<p class='lr-box'>No recipes found</p>";
}

$conn->close();