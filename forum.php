<!DOCTYPE html>
<html lang="nl">
<link rel="stylesheet" href="styles.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Hoofdpagina</title>
</head>
<?php
$username = "Admin";
$title = "Admin";
?>
<body>
    <div id="topbar">
        <div id="forum-title">
            <h1>
                <?php echo "Welkom bij TraceNook &nbsp;", $title, $username?>
            </h1>
        </div>
        <div id="right-top-bar">
            <div id="notification">
                <a href="notifications.html">Notifications</a>
            </div>
            <div id="account">
                <a href="settings.html"><button class="settings">settings</button></a>
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
    <script type="text/javascript" src="time.js"></script>
</body>

</html>