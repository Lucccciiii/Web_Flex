<?php
session_start();
$dbusername = "root";
$dbpassword = "";

$username = $_SESSION['uname'];
$opassword = $_POST['opassword'];
$npassword = $_POST['npassword'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

$checkpassword = $conn->prepare("SELECT * FROM users WHERE user = :username");
$checkpassword->bindParam(":username", $username);
$checkpassword->execute();

$oldpassword = $checkpassword->fetch(PDO::FETCH_ASSOC);

if (is_array($oldpassword)){
    if (password_verify($opassword,$oldpassword['password'])){
        $newpassword = $conn->prepare("ALTER password FROM users WHERE user = :username");
        $newpassword->bindParam(":username", $username);
        $newpassword->execute();
        header("Location");
    }
    else {

    }
}