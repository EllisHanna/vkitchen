<?php

session_start();

if(isset($_SESSION['userid'])){
    echo '
    <nav>
        <img src="./images/logo.png" id="logo">
        <ul id="nav-list">
            <li class="nav-element"><a href="index.php" class="active-element">Home</a></li>
            <li class="nav-element"><a href="myrecipes.php">My Recipes</a></li>
            <li class="nav-element"><a href="addrecipe.php">Add Recipe</a></li>
            <li class="nav-element"><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>';
}
else {
    echo '
    <nav>
        <img src="./images/logo.png" id="logo">
        <ul id="nav-list">
            <li class="nav-element"><a href="index.php" class="active-element">Home</a></li>
            <li class="nav-element"><a href="login.php">Login</a></li>
        </ul>
    </nav>';
}
