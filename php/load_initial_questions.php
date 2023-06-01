<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "./sphinx.php";
require_once "./displayer.php";
session_start();

if (!isset($_SESSION['sphinx'])) {
  $sphinx = new Sphinx("../prompts/questions.json");
  $_SESSION['sphinx'] = $sphinx;
} else {
  $sphinx = $_SESSION['sphinx'] ;
}

if (!isset($_SESSION['displayer'])) {
  $displayer = new Displayer('../images/left_pane','../images/right_pane');
  $_SESSION['displayer'] = $displayer;
} else {
  $displayer = $_SESSION['displayer'] ;
}

// Load the main template file
$template = $displayer->prepare_base_frame();

// Replace placeholders in the main template
$subpage = file_get_contents('plain_main.php');

// Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{ACTION SCRIPT}}', "./load_long_term_plan.php", $subpage);
$subpage = str_replace('{{CURRENT SCRIPT}}', "./load_initial_questions.php", $subpage);
$subpage = str_replace('{{SUBPAGE_TITLE}}', "What are you interested in?", $subpage);
$subpage = str_replace('{{SUBPAGE_CONTENT}}', "", $subpage);
$subpage = str_replace('{{FORM CONTENT}}', $sphinx->ask_initial_questions(), $subpage);

// Replace placeholders in the main template with the subpage content
// $template = str_replace('{{TITLE}}', $title, $template);
// $template = str_replace('{{HEADER}}', $header, $template);
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);

// Output the final HTML
echo $template;
?>
