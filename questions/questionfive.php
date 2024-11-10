<?php
// questionfive.php
session_start();

$answer = isset($_POST["answer"]) ? $_POST["answer"] : '';

// Handle quitting
if ($answer == "X") {
    $_SESSION['current_money'] = 100000;
    header("Location: final.php");
    exit();
}

// Check correct answer
if ($answer != "D") { // Changed to D since Justin Timberlake wasn't a Beatle
    header("Location: wrong.php");
    exit();
}

// Update current money for this level
$_SESSION['current_money'] = 100000;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Question 5</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="questionstyle.css">
</head>

<body>
    <h1>Question 5</h1>
    <div>
        <form action="./final.php" method="post">
            <fieldset>
                <legend>Who wasn't a member of the Beatles?</legend>
                <div class="options">
                    <input type="radio" id="JohnLennon" name="answer" value="A">
                    <label for="JohnLennon">John Lennon</label>
                </div>
                <div class="options">
                    <input type="radio" id="RingoStar" name="answer" value="B">
                    <label for="RingoStar">Ringo Star</label>
                </div>
                <div class="bottom-options">
                    <input type="radio" id="PaulMcCartney" name="answer" value="C">
                    <label for="PaulMcCartney">Paul McCartney</label>
                </div>
                <div class="bottom-options">
                    <input type="radio" id="JustinTimberlake" name="answer" value="D">
                    <label for="JustinTimberlake">Justin Timberlake</label>
                </div>
                <div class="bottom-options" id="quit-section">
                    <input type="radio" id="Quit" name="answer" value="X">
                    <label id="Quit-Label" for="Quit">I'll quit at $100,000</label>
                </div>
                <div class="submit-section">
                    <input class="submit-box" type="submit" value="Submit">
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>