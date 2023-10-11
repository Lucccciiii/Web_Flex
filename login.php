<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flex_webdb";

$id = "0";
$username = $_POST["uname"];
$password = $_POST["psw"];

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

//if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
//    $username = $_POST["uname"];
//    $password = $_POST["psw"];
//}
//echo $username, " ", $passwordscram;

