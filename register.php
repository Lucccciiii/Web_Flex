<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flex_webdb";
$id = "0";
if(isset($_POST)) /*Checks if posts are submitted via form*/{

    echo "ysad";
    $username = $_POST["uname"];
    $password = $_POST["psw"];
    $passwordv =$_POST["psw2"];
}
else{
    header("Location: index.html");
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

//SELECT * FROM USERS WHERE name = uname

$verify_username = $conn->prepare("SELECT user FROM users")/*Gets all usernames from database for verification*/;
$verify_username->execute();
$verify=$verify_username->fetch(PDO::FETCH_ASSOC);

//if verify username > 0
//Then user exists

if(is_array($verify)){

    if($verify["user"] === $username)/*Checks if username is already in database*/ {
        header("Location: register.html");
    }
    else{
        echo "error";
    }
}

if ($password === $passwordv) /*Checks if password is the same as the second password*/{
$insert_user = $conn->prepare("INSERT INTO users (user, password) VALUES (:username, :password)");
$insert_user->bindParam(":username", $username);
$insert_user->bindParam(":password", $passwordscram);
$insert_user->execute();
    header("Location: index.html");
}
else {
    header("Location: register.html");
}

echo $username, " ", $passwordscram;

$conn=null;/*Terminates database connection*/