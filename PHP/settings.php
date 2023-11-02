<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="icon" type="image/png" href="../Pics/Tracenook-ico-64x64.png">
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
</head>
<body>
    <div id="home">
            <a onclick="" href="../PHP/forum-loggedin.php">
                <img src="../Pics/house-16.ico">
            </a>
        <div id="box-changepass">
            <form id="changepassword" method="post" action="changepassword.php">
                <label class = "opassword" for="opass"><b>Old password</b></label>
                <input id="opsw" type="password" placeholder="Enter old password" name="opass" required >
                <div id="paserror">
                    <?php
                    if(isset($_SESSION['redirect'])) {
                        if ($_SESSION['passerror'] === 1) {
                            echo "Invalid password";
                        }
                        if ($_SESSION['passerror'] === 0){
                            echo "New password can't be same as old password";
                        }
                    }
                    ?>
                </div>
                <label class = "npassword" for="npass"><b>New password</b></label>
                <input id="npsw" type="password" placeholder="Enter new password" name="npass" required>

                <input type="submit">
                <div id="passuc">
                    <?php
                    if(isset($_SESSION['redirect'])){
                        if (isset($_SESSION['opsuc'])){
                            echo "Password changed succesfully";
                        }
                    }
                    ?></div>
            </form>
        </div>
    </div>

</body>
</html>