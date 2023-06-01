<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!empty(session_id())) {
  session_unset();
}

require_once "./php/sphinx.php";
session_start();
if (!isset($_SESSION['sphinx'])) {
  $sphinx = new Sphinx('John', 25, "./prompts/questions.json");
  $_SESSION['sphinx'] = $sphinx;
} else {
  $sphinx = $_SESSION['sphinx'] ;
}

// Load the main template file
$template = file_get_contents('./php/base.php');

// Replace placeholders in the main template
$title = 'My Page Title';
$header = 'Welcome to My Website';
$subpage = file_get_contents('./php/index_page.php');
// All but this file are in ./php folder, so path changes are necessary only here
$template = str_replace('../css/style.css', "./css/style.css", $template);
$template = str_replace('../index.php', "./index.php", $template);
$template = str_replace('../images/sphinx.png', "./images/sphinx.png", $template);


// // Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{ACTION SCRIPT}}', "./php/load_initial_questions.php", $subpage);
// $subpage = str_replace('{{SUBPAGE_TITLE}}', $subpageTitle, $subpage);
// $subpage = str_replace('{{CURRENT SCRIPT}}', "./load_long_term_plan.php", $subpage);
// $subpage = str_replace('{{SUBPAGE_CONTENT}}', $subpageContent, $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{TITLE}}', $title, $template);
$template = str_replace('{{HEADER}}', $header, $template);
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);

// Output the final HTML
echo $template;
?>

