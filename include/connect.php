<?php

$serverName = "localhost";
$dbUsername = "u-240267573";
$dbPassword = "L9292CD6etNr6gg";
$dbName = "u_240267573_db";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}