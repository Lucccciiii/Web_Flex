<?php
session_start();
$dbusername = "root";
$dbpassword = "";

$username = $_SESSION['uname'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

$checkpassword = $conn->prepare("SELECT * FROM users WHERE user = :username");
$checkpassword->bindParam(":username", $username);
$checkpassword->execute();

