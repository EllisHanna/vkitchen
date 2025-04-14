<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordconfirm = $_POST["confirmpassword"];

    require_once 'connect.php';
    require_once 'functions.php';

    if(checkEmpty($email, $password, $passwordconfirm) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if(checkUsername($username)){
        header("location: ../register.php?error=invalidusername");
        exit();
    }

    if(checkEmail($email)){
        header("location: ../register.php");
        exit();
    }

    if(checkPassword($password, $passwordconfirm)){
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    if(userExists($conn, $username, $email)){
        header("location: ../register.php?error=userexists");
        exit();
    }

    createUser($conn, $username, $email, $password);
}
else{
    header("location: ../register.php");
    exit();
}