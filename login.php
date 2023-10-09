<?php
$servername = "localhost";
$dbusername = "username";
$dbpassword = "password";
$dbname = "Flex_webDB";

$username = $_POST["uname"];
$password = $_POST["psw"];
$passwordscram = "";

$conn = new mysqli($servername, $dbusername, $dbname);

if ($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users(id,user,password)
VALUES (0,$username,$passwordscram);";

echo $username, " ", $password;
