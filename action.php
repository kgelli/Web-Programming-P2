<?php
session_start();

class ScoreManager
{
   private $dataFile;

   public function __construct($dataFile)
   {
      $this->dataFile = $dataFile;
   }

   public function saveScore($username, $score)
   {
      if (empty($username) || !is_numeric($score)) {
         throw new Exception("Invalid data provided");
      }

      // Sanitize the username to remove commas
      $username = str_replace(',', '', trim($username));
      $score = (int)$score;

      // Create data directory if it doesn't exist
      $dir = dirname($this->dataFile);
      if (!is_dir($dir)) {
         mkdir($dir, 0755, true);
      }

      // Append the score to the file
      $success = file_put_contents(
         $this->dataFile,
         $username . ',' . $score . "\n",
         FILE_APPEND | LOCK_EX
      );

      if ($success === false) {
         throw new Exception("Failed to save score");
      }

      return true;
   }

   public function updateExistingScore($username, $newScore)
   {
      if (!file_exists($this->dataFile)) {
         return $this->saveScore($username, $newScore);
      }

      $lines = file($this->dataFile);
      $found = false;
      $newLines = array();

      foreach ($lines as $line) {
         $data = explode(',', trim($line));
         if (count($data) >= 2 && trim($data[0]) === $username) {
            if ((int)$data[1] < $newScore) {
               $newLines[] = $username . ',' . $newScore . "\n";
            } else {
               $newLines[] = $line;
            }
            $found = true;
         } else {
            $newLines[] = $line;
         }
      }

      if (!$found) {
         $newLines[] = $username . ',' . $newScore . "\n";
      }

      $success = file_put_contents($this->dataFile, implode('', $newLines), LOCK_EX);

      if ($success === false) {
         throw new Exception("Failed to update score");
      }

      return true;
   }
}

// Handle the score submission
if (isset($_SESSION['username']) && isset($_SESSION['current_money'])) {
   try {
      $scoreManager = new ScoreManager('../data/data.txt');
      $scoreManager->updateExistingScore(
         $_SESSION['username'],
         $_SESSION['current_money']
      );

      // Clear game session data but keep user login
      $username = $_SESSION['username'];
      session_unset();
      $_SESSION['username'] = $username;

      header("Location: ../leaderboard.php");
      exit();
   } catch (Exception $e) {
      error_log("Score save error: " . $e->getMessage());
      header("Location: ../error.php?message=" . urlencode("Failed to save score"));
      exit();
   }
} else {
   header("Location: ../index.html");
   exit();
}
