<?php
session_start();

$file = '../data/data.txt';
$textFile = file_get_contents($file);
$singles = explode("\n", $textFile);
$player = $_POST["player"];
$userInfo = array();
$userExists = false;

// Check if the user exists in the data file
foreach ($singles as $users) {
    $userInfo = explode(",", $users);
    if ($userInfo[0] == $player) {
        $userExists = true;
        $_SESSION['username'] = $player;
        header("Location: ../questions/start.php");
        exit();
    }
}

// If user does not exist, display a message and redirect to register
if (!$userExists) {
    echo "<html>
        <head>
            <meta http-equiv='refresh' content='3;url=./register.php' />
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: sans-serif;
                    background-image: linear-gradient(to bottom right,
                        #5dade2,
                        #7fb3d5,
                        #525599,
                        #7db6c6,
                        #0a315d);
                    text-align: center;
                    padding-top: 50px;
                    color: #333;
                }
                .message {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <div class='message'>
                You are a new user. Redirecting to the registration page...
            </div>
        </body>
    </html>";
    exit();
}
?>
