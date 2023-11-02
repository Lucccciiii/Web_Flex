<?php
session_start();
$dbusername = "root";
$dbpassword = "";

$username = $_SESSION['uname'];
$opassword = $_POST['opass'];
$npassword = $_POST['npass'];
$redirect = "";
$opsuc = "";
$_SESSION['redirect'] = "";
try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

if($opassword === $npassword){

    $_SESSION['passerror'] = 0;
    header("Location: settings.php");
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
        $_SESSION['opsuc'] = 1;
        header("Location: settings.php");
    }
    else {
        $_SESSION['passerror'] = 1;
        header("Location: settings.php");
    }
}