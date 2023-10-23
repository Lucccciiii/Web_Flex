<?php
session_start();
$dbusername = "root";
$dbpassword = "";

$username = $_SESSION['uname'];
$opassword = $_POST['opass'];
$npassword = $_POST['npass'];
$redirect = "";
$paserror = "";
$opsuc = "";

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

if($opassword === $npassword){
    header("Location: settings.php?redirect=$redirect&paserror=0");
    return "0"; 
}

$checkpassword = $conn->prepare("SELECT * FROM users WHERE user = :username");
$checkpassword->bindParam(":username", $username);
$checkpassword->execute();

$oldpassword = $checkpassword->fetch(PDO::FETCH_ASSOC);
$npasshash = password_hash($npassword, PASSWORD_DEFAULT);

if (is_array($oldpassword)){
    if (password_verify($opassword,$oldpassword['password'])){
        $newpassword = $conn->prepare("UPDATE users SET password = :password WHERE user = :username");
        $newpassword->bindParam(":username", $username);
        $newpassword->bindParam(":password", $npasshash);
        $newpassword->execute();
        header("Location: settings.php?redirect=$redirect&opsuc=$opsuc");
    }
    else {
        header("Location: settings.php?redirect=$redirect&paserror=1");
    }
}