<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Finale</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    $answer = isset($_POST["answer"]) ? $_POST["answer"] : '';

    // Set the money based on game outcome
    if ($answer == "X") {
        // Player quit - get the current money from session
        $money = isset($_SESSION['current_money']) ? $_SESSION['current_money'] : 0;
    } elseif ($answer == "D") {
        // Player won the game
        $money = 1000000;
    } else {
        if (!isset($_SESSION['current_money'])) {
            // If no valid game state, redirect to start
            header("Location: ./start.php");
            exit();
        }
        $money = $_SESSION['current_money'];
    }

    // Store final amount in session
    $_SESSION['current_money'] = $money;
    ?>
    <div class="login-box">
        <form action="./startreg.php" method="post">
            <img class="final-img" src="../data/logo.png" alt="Logo" class="center">
            <?php
            $formatted_money = number_format($money);
            echo "<h2>Congratulations!</h2>";
            echo "<h2>You've made it with $" . $formatted_money . "</h2>";
            ?>
        </form>
        <a class="button" title="Sign up" href="./start.php">TRY AGAIN</a>
        <a class="button" title="Leaderboard" href="../leaderboard.php">LEADERBOARD</a>
    </div>
    <?php
    // Clear the session data after displaying results
    session_destroy();
    ?>
</body>

</html>