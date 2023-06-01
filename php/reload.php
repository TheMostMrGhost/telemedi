<?php
declare(strict_types=1);
require_once "./sphinx.php";
session_start();
$sphinx = $_SESSION['sphinx'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['modification-message'], $_POST['script_to_reload'])) {
    // Get the values from the form
    $message = $_POST['modification-message'];
    $nextScript = $_POST['script_to_reload'];

    // Process the message using $sphinx->promptgpt()
    // Assuming $sphinx is an instance of the Sphinx class
    $message = "The user wanted to changed something. Here is their comment:\n".$message
    ."\n You will be asked to regenerate answer to your last question. Takie this message into account";
    $result = $sphinx->update_gpt_state($message);

    // Load the next script using $nextScript
    // Include or redirect to the next script based on $nextScript

    // Example: Including the next script
    include $nextScript;

    // Example: Redirecting to the next script
    header("Location: $nextScript");
    exit;
  }
}
?>

<!-- <!DOCTYPE html> -->
<!-- <html> -->
<!-- <head> -->
<!--   <title>Form Example</title> -->
<!-- </head> -->
<!-- <body> -->
<!--   <form action="" method="post"> -->
<!--     <label for="modification-message">Did you forget about something or are unsatisfied with the current answer? Tell me about it!</label><br> -->
<!--     <input type="hidden" name="next-script" value="{{NEXT SCRIPT}}"> -->
<!--     <textarea id="modification-message" name="modification-message"></textarea><br> -->
<!--     <button type="submit">Reapply</button> -->
<!--   </form> -->
<!-- </body> -->
<!-- </html> -->
