<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flex_webdb";

if(isset($_POST['submit']))/*Confirms input is send via Submit*/{
    $username = $_POST["uname"];
    $password = $_POST["psw"];
}

try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}

$login_user = $conn->prepare ("SELECT * FROM users WHERE user = :username "); /*Selects user for verification of the user's password */
$login_user->bindparam(":username", $username);
$login_user->execute();

$verify = $login_user->fetch(PDO::FETCH_ASSOC); /*Fetches associated values for user's username*/

if (is_array($verify))/*Checks if the $verify is an array*/{
    if (password_verify($password,$verify['password']))/*Verifies if the user inputted password is the same as the password saved in database*/{
        $_SESSION['uname'] = $username; // $username coming from the form, such as $_POST['username']

        header("Location: forum.html");
    }
    else {
        header("Location: login.html");
    }
}

$con=null; /*Terminates database connection*/