<?php
function checkEmpty($email, $password, $passwordconfirm) {
    $isEmpty;

    if(empty($email) || empty($password) || empty($passwordconfirm)){
        $isEmpty = true;
    }
    else{
        $isEmpty = false;
    }

    return $isEmpty;
}

function checkUsername($username) {
    $isValid;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $isValid = true;
    }
    else{
        $isValid = false;
    }

    return $isValid;
}

function checkEmail($email) {
    $isValid;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $isValid = true;
    }
    else{
        $isValid = false;
    }

    return $isValid;
}

function checkPassword($password, $passwordconfirm) {
    $isValid;

    if($password !== $passwordconfirm){
        $isValid = true;
    }
    else{
        $isValid = false;
    }

    return $isValid;
}

function userExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($data)){
        return $row;
    }
    else{
        $data = false;
        return $data;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $password){
    $sql = "INSERT INTO users(username,password,email) VALUES(?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedpassword, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php");
    exit();
}

function loginUser($conn, $email, $password) {
    $user = userexists($conn, "", $email);

    if ($user === false) {
        header("location: ../login.php?error=usernotfound");
        exit();
    }

    $hashedpassword = $user["password"];
    $checkpassword = password_verify($password, $hashedpassword);

    if ($checkpassword === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else {
        session_start();
        $_SESSION["userid"] = $user["uid"];
        $_SESSION["username"] = $user["username"];
        header("location: ../home.php");
        exit();
    }
}

function uploadRecipe($conn, $recipename, $description, $recipetype, $cooktime, $ingredients, $instructions, $destination, $uid) {
    $sql = "INSERT INTO recipes(name, description, type, Cookingtime, ingredients, instructions, image, uid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssisssi", $recipename, $description, $recipetype, $cooktime, $ingredients, $instructions, $destination, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../addrecipe.php?success=recipeadded");
    exit();
}

function getOwner($conn, $uid){
    $sql = "SELECT username FROM users WHERE uid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['username'];
    }

    mysqli_stmt_close($stmt);
}