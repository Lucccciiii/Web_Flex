<?php
session_start();
$dbusername = "root";
$dbpassword = "";

$username =$_SESSION['uname'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

$permission_user = $conn->prepare("SELECT * FROM users WHERE user = :username;");
$permission_user->bindParam(':username',$username);
$permission_user->execute();

$permissions = $permission_user->fetch(PDO::FETCH_ASSOC);

echo $permissions['permissions'];
$_SESSION['permissions'] = $permissions['permissions'];
$_SESSION['Loggedin'] = true;

header('Location: forum-loggedin.php');