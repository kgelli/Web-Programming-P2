<?php
session_start();

// Verify answer from previous question and update money
$answer = isset($_POST["answer"]) ? $_POST["answer"] : '';
if ($answer != "C") {
	header("Location: ./wrong.php");
	exit();
}

// Update current money for this level
$_SESSION['current_money'] = 100;
?>
<!DOCTYPE html>
<html>

<head>
	<title>Question 2</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="questionstyle.css">
</head>

<body>
	<h1>Question 2</h1>
	<div>
		<form action="./questionthree.php" method="post">
			<fieldset>
				<legend>What does the word loquacious mean?</legend>
				<div class="options">
					<input type="radio" id="Angry" name="answer" value="A">
					<label for="Angry">Angry</label>
				</div>
				<div class="options">
					<input type="radio" id="Chatty" name="answer" value="B">
					<label for="Chatty">Chatty</label>
				</div>
				<div class="bottom-options">
					<input type="radio" id="Shy" name="answer" value="C">
					<label for="Shy">Shy</label>
				</div>
				<div class="bottom-options">
					<input type="radio" id="Beautiful" name="answer" value="D">
					<label for="Beautiful">Beautiful</label>
				</div>
				<div class="bottom-options" id="quit-section">
					<input type="radio" id="Quit" name="answer" value="X">
					<label id="Quit-Label" for="Quit">I'll quit at $100</label>
				</div>
				<div class="submit-section">
					<input class="submit-box" type="submit" value="Submit">
				</div>
			</fieldset>
		</form>
	</div>
</body>

</html>