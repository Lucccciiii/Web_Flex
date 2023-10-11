<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flex_webdb";

$id = "0";
if(isset($_POST['submit'])){
    $username = $_POST["uname"];
    $password = $_POST["psw"];
    $passwordv =$_POST["psw2"];
}
$username = $_POST["uname"];
$password = $_POST["psw"];
$passwordv = $_POST["psw2"];



$passwordscram = password_hash($password, PASSWORD_DEFAULT);

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

$insert_user = $conn->prepare("INSERT INTO users (user, password) VALUES (:username, :password)");
$insert_user->bindParam(":username", $username);
$insert_user->bindParam(":password", $passwordscram);
$insert_user->execute();

echo $username, " ", $passwordscram;

