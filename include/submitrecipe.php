<?php

session_start();
require_once 'connect.php';
require_once 'functions.php';

if(isset($_POST["submit"])){
    $recipename = $_POST['recipename'];
    $description = $_POST['description'];
    $recipetype = $_POST['recipetype'];
    $cooktime = $_POST['cooktime'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $uid = $_SESSION['userid'];
}