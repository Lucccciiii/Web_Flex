<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flex_webdb";

/*Checks for post*/
if(isset($_POST)){
    $username = $_POST["uname"];
    $password = $_POST["psw"];
}
try {
    $conn = new PDO("mysql:host=localhost;dbname=flex_webdb", $dbusername, $dbpassword);

}catch (PDOException $error){
    echo $error->getMessage();
}
/*Selects user for verification of the user's password */
$login_user = $conn->prepare ("SELECT * FROM users WHERE user = :username ");
$login_user->bindparam(":username", $username);
$login_user->execute();

$sql = "SELECT COUNT(*) FROM users WHERE user = :username";
$res = $conn->prepare($sql);
$res->bindParam(":username", $username);
$res->execute();
$count = $res->fetchColumn();
if ($count != 0){
}
else {
    echo "error";
    return 0;
}
$verifyp = $login_user->fetch(PDO::FETCH_ASSOC); /*Fetches associated values for user's username*/

if (is_array($verifyp)){
    if (password_verify($password,$verifyp['password'])){
        $_SESSION['uname'] = $username; // $username coming from the form, such as $_POST['username']

        header("Location: checklogin.php");
    }
    else {
        header("Location: /Web_Flex/Html/login.html");
    }
}

$con=null;