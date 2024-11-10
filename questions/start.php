<?php
// start.php
session_start();
// Clear any existing session data when starting new game
session_destroy();
session_start();
$_SESSION['current_money'] = 0;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="login-box">
        <legend>
            <img src="../data/logo.png" alt="Millionaire?" width="500" height="500">
        </legend>
        <br>
        <h2>Ready to be a Millionaire?</h2>
        <a class="button" title="Sign up" href="./questionone.php">START</a>
    </div>
</body>

</html>