<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!empty(session_id())) {
  session_unset();
}

require_once "./sphinx.php";
require_once "./displayer.php";
session_start();
if (!isset($_SESSION['sphinx'])) {
  $sphinx = new Sphinx('John', 25, "./prompts/questions.json");
  $_SESSION['sphinx'] = $sphinx;
} else {
  $sphinx = $_SESSION['sphinx'] ;
}

// Load the main template file
$displayer = new Displayer('../images/left_pane','../images/right_pane');
$template = $displayer->prepare_base_frame();

// Replace placeholders in the main template
$subpage = file_get_contents('./index_page.php');

// // Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{ACTION SCRIPT}}', "./load_initial_questions.php", $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);

// Output the final HTML
echo $template;
?>

