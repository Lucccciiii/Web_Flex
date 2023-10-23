<?php
session_start();
$username = $_SESSION['uname'];
$perms = $_SESSION['permissions'];
$title = ["Admin", "User", "Guest"];
$logged = $_SESSION['Loggedin'];
if ($logged = false) {
    $perms = [2];
}
?>

<!DOCTYPE html>
<html lang="nl">
<link rel="stylesheet" href="/CSS/styles.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Hoofdpagina</title>
    <link rel="icon" type="image/png" href="../Pics/Tracenook-ico-64x64.png">
</head>
<body>
<div id="topbar">
    <img src="/Pics/Tracenook-ico.png">
    <div id="forum-title">
        <h1>
            <?php echo "Welkom bij TraceNook ", $title[$perms]," ", $username?>
        </h1>
    </div>
    <div id="right-top-bar-loggedin">
        <div id="notification">
            <a href="../Html/notification.html">Notifications</a>
        </div>
        <div id="account">
            <a href="../Html/settings.html"><button class="settings">settings</button></a>
        </div>
        <div id="logout">
            <a href="logout.php"><button class="logout">logout</button></a>
        </div>
    </div>
</div>
<div id="newpost">
    <form></form>
</div>
<div id="bottom-container">
    <div class="bottomright">
        <p id="date"></p>
    </div>
    <div class="bottom"><p class="times">2023 Luc Stolk | All rights reserved</p></div>
</div>
<script type="text/javascript" src="/JS/time.js"></script>
</body>

</html>