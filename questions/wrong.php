<?php
// wrong.php
session_start();
// Clear session data on wrong answer
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
  <title>EndGame</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="login-box">
    <img src="../data/logo.png" alt="Logo" class="center">
    <h2>Uh Oh, You got it wrong!</h2>
    <h2>You won $<?php echo isset($_SESSION['current_money']) ? number_format($_SESSION['current_money']) : '0'; ?></h2>
    <a class="button" title="Sign up" href="./start.php">TRY AGAIN</a>
    <a class="button" title="Leaderboard" href="../leaderboard.php">LEADERBOARD</a>
  </div>
</body>

</html>