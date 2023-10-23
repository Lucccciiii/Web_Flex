<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flex_webdb";

/*Checks for post */
if(isset($_POST)) {
    $username = $_POST["uname"];
    $password = $_POST["psw"];
    $passwordv =$_POST["psw2"];
}
else{
    header("Location: ../Html/register.html");
}
$username = $_POST["uname"]; /*gets value for username from html post*/
$password = $_POST["psw"];   /*gets value for password from html post*/
$passwordv = $_POST["psw2"]; /*gets value to verify from html post*/

$passwordscram = password_hash($password, PASSWORD_DEFAULT); /*Hashes the users password for safe storage in database*/

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

/*Gets all usernames from database for verification*/
$verify_username = $conn->prepare("SELECT user FROM users");
$verify_username->execute();
$verify=$verify_username->fetch(PDO::FETCH_ASSOC);

if(is_array($verify)){
    /*Checks if username is already in database*/
    if($verify["user"] === $username){
        header("Location: ../Html/register.html");
    }
}

if ($password === $passwordv){
$insert_user = $conn->prepare("INSERT INTO users (user, password, permissions) VALUES (:username, :password, 1)");
$insert_user->bindParam(":username", $username);
$insert_user->bindParam(":password", $passwordscram);
$insert_user->execute();
    header("Location: ../PHP/checklogin.php");
    $_SESSION['uname'] = $username;
}
else {
    header("Location: ../Html/register.html");
}

$conn=null;