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
$subpage = file_get_contents('summary_page.php');

// Replace placeholders in the subpage template
$subpageTitle = 'SUMMARY Title';
$subpageContent = '<p>This is the content of the subpage.</p>';

// Replace placeholders in the subpage template with specific content
// $subpage = str_replace('{{SUBPAGE_TITLE}}', $subpageTitle, $subpage);
// $summary = "Summary:<br>".
            // ."<br>".$sphinx->show_summary('middle_term_plan')
            // ."<br>".$sphinx->show_summary('short_term_plan')
            // ."<br>If you need help, I'm here!";
// $subpage = str_replace('{{SUBPAGE_CONTENT}}', $summary, $subpage);
        
$subpage = str_replace('{{LONG TERM PLAN}}', $sphinx->show_summary('long_term_plan'), $subpage);
$subpage = str_replace('{{MIDDLE TERM PLAN}}', $sphinx->show_summary('middle_term_plan'), $subpage);
$subpage = str_replace('{{SHORT TERM PLAN}}', $sphinx->show_summary('short_term_plan'), $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{TITLE}}', $title, $template);
$template = str_replace('{{HEADER}}', $header, $template);
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);
// and here a plan for each week

// Output the final HTML
echo $template;
// session_unset();
// session_destroy();
?>

