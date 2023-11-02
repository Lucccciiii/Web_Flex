<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<link rel="stylesheet" href="../CSS/styles.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main id="logincontainer">
        <img src ="../Pics/Tracenook-ico.png" width="200" height="120">
        <form id="logincontainer2" method="post" action="/Web_Flex/PHP/login.php">

            <label class="username" for="uname"><b>Username</b></label>
            <input id="uname" type="text" placeholder="Enter Username" name="uname" required>

            <label class="password" for="psw"><b>Password</b></label>
            <input id="psw" type="password" placeholder="Enter Password" name="psw" required>

            <input type="submit"></input>

        </form>
    </main>
</body>
</html>