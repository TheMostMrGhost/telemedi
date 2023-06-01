<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "./sphinx.php";
session_start();
$sphinx = $_SESSION['sphinx'];

// Load the main template file
$template = file_get_contents('base.php');

// Replace placeholders in the main template
$title = 'My Page Title';
$header = 'Welcome to My Website';
$subpage = file_get_contents('content.php');

// Replace placeholders in the subpage template
$subpageTitle = 'LOND Title';
// $subpageTitle = $sphinx->thank_for_answering();
$subpageContent = '<p>This is the content of the subpage.</p>';

// Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{ACTION SCRIPT}}', "./load_middle_term_plan.php", $subpage);
$subpage = str_replace('{{SUBPAGE_TITLE}}', $subpageTitle, $subpage);
$subpage = str_replace('{{CURRENT SCRIPT}}', "./load_long_term_plan.php", $subpage);

    // public function propose_plan(string $plan_duration) : string{ // long, middle, short term
$subpage = str_replace('{{SUBPAGE_CONTENT}}', $sphinx->propose_plan('long_term_plan'), $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{TITLE}}', $title, $template);
$template = str_replace('{{HEADER}}', $header, $template);
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);

// Output the final HTML
echo $template;
?>

