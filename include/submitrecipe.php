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
    $image = $_FILES['image'];
    $uid = $_SESSION['userid'];

    $imagedirectory = "../images/";
    $filename = $image['name'];
    $tempfilename = $image['tmp_name'];
    $filetype = $image['type'];
    $fileextension = explode('.', $filename);
    $fileactualextension = strtolower(end($fileextension));

    $validextensions = array('png', 'jpg', 'jpeg');
    if(in_array($fileactualextension,$validextensions)){
        $newfilename = uniqid('', true).".".$fileactualextension;
        $destination = $imagedirectory.$newfilename;
        move_uploaded_file($tempfilename, $destination);
        uploadRecipe($conn, $recipename, $description, $recipetype, $cooktime, $ingredients, $instructions, $destination, $uid);
    }
    else{
        header("location: ../addrecipe.php?error=imagenotvalid");
        exit();
    }
}