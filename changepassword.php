<?php
session_start();


$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flex_webdb";

$username = $_SESSION[$username];

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

$checkpassword = $conn->prepare("SELECT * FROM users WHERE user = :username");
$checkpassword->bindParam(":username", $username);