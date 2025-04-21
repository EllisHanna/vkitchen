<?php
session_start();
require_once 'connect.php';

if (isset($_POST['submit'])) {
    $recipename = $_POST['recipename'];
    $description = $_POST['description'];
    $recipetype = $_POST['recipetype'];
    $cooktime = $_POST['cooktime'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $rid = intval($_POST['rid']);

    $image = $_FILES['image'];
    $imagePath = null;

    if ($image['error'] == 0) {
        $imageDirectory = "../images/";
        $filename = $image['name'];
        $tempFilename = $image['tmp_name'];
        $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $validExtensions = ['png', 'jpg', 'jpeg'];

        if (in_array($fileExtension, $validExtensions)) {
            $newFileName = uniqid('', true) . '.' . $fileExtension;
            $destination = $imageDirectory . $newFileName;
            move_uploaded_file($tempFilename, $destination);
            $imagePath = $destination;
        } else {
            header("Location: ../editrecipe.php?rid=$rid&error=invalidimage");
            exit();
        }
    }

    $sql = "UPDATE recipes SET name = ?, description = ?, type = ?, Cookingtime = ?, ingredients = ?, instructions = ?";
    if ($imagePath) {
        $sql .= ", image = ?";
    }
    $sql .= " WHERE rid = ? AND uid = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("SQL Prepare failed: " . $conn->error);
    }
    
    if ($imagePath) {
        $stmt->bind_param("sssiissii", $recipename, $description, $recipetype, $cooktime, $ingredients, $instructions, $imagePath, $rid, $_SESSION['userid']);
    } 
    else {
        $stmt->bind_param("sssiissi", $recipename, $description, $recipetype, $cooktime, $ingredients, $instructions, $rid, $_SESSION['userid']);
    }

    if ($stmt->execute()) {
        header("Location: ../myrecipes.php?success=updated");
    }
}