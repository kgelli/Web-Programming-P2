<?php
session_start();
// Initialize the game session
$_SESSION['current_money'] = 0;
?>
<!DOCTYPE html>
<html>

<head>
	<title>Question 1</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="questionstyle.css">
</head>

<body>
	<h1>Question 1</h1>
	<div>
		<form action="./questiontwo.php" method="post">
			<fieldset>
				<legend>Which Disney character famously leaves a glass slipper behind at a royal ball?</legend>
				<div class="options">
					<input type="radio" id="Pocahontas" name="answer" value="A">
					<label for="Pocahontas">Pocahontas</label>
				</div>
				<div class="options">
					<input type="radio" id="Ariel" name="answer" value="B">
					<label for="Ariel">Ariel</label>
				</div>
				<div class="bottom-options">
					<input type="radio" id="Cinderella" name="answer" value="C">
					<label for="Cinderella">Cinderella</label>
				</div>
				<div class="bottom-options">
					<input type="radio" id="Elsa" name="answer" value="D">
					<label for="Elsa">Elsa</label>
				</div>
				<div class="submit-section">
					<input class="submit-box" type="submit" value="Submit">
				</div>
			</fieldset>
		</form>
	</div>
</body>

</html>