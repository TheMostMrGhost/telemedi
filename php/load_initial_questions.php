<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "./sphinx.php";
session_start();

if (!isset($_SESSION['sphinx'])) {
  $sphinx = new Sphinx('John', 25, "../prompts/questions.json");
  $_SESSION['sphinx'] = $sphinx;
} else {
  $sphinx = $_SESSION['sphinx'] ;
}

// Load the main template file
$template = file_get_contents('base.php');

// Replace placeholders in the main template
$subpage = file_get_contents('content.php');

// Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{ACTION SCRIPT}}', "./load_long_term_plan.php", $subpage);
$subpage = str_replace('{{CURRENT SCRIPT}}', "./load_initial_questions.php", $subpage);
$subpage = str_replace('{{SUBPAGE_CONTENT}}', $sphinx->ask_initial_questions(), $subpage);

// Replace placeholders in the main template with the subpage content
// $template = str_replace('{{TITLE}}', $title, $template);
// $template = str_replace('{{HEADER}}', $header, $template);
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);

// Output the final HTML
echo $template;
?>
