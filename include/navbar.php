<?php
$navpage = basename($_SERVER['PHP_SELF']);

if (isset($_SESSION['userid'])) {
    echo '
    <nav>
        <img src="./images/logo.png" id="logo">
        <ul id="nav-list">
            <li class="nav-element"><a href="home.php" class="' . ($navpage == 'home.php' ? 'active-element' : '') . '">Home</a></li>
            <li class="nav-element"><a href="myrecipes.php" class="' . ($navpage == 'myrecipes.php' ? 'active-element' : '') . '">My Recipes</a></li>
            <li class="nav-element"><a href="addrecipe.php" class="' . ($navpage == 'addrecipe.php' ? 'active-element' : '') . '">Add Recipe</a></li>
            <li class="nav-element"><a href="include/logout.php">Log Out</a></li>
        </ul>
    </nav>';
} else {
    echo '
    <nav>
        <img src="./images/logo.png" id="logo">
        <ul id="nav-list">
            <li class="nav-element"><a href="home.php" class="' . ($navpage == 'home.php' ? 'active-element' : '') . '">Home</a></li>
            <li class="nav-element"><a href="login.php" class="' . ($navpage == 'login.php' ? 'active-element' : '') . '">Login</a></li>
        </ul>
    </nav>';
}
?>
