<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "./sphinx.php";
require_once "./displayer.php";
session_start();
$sphinx = $_SESSION['sphinx'];
$displayer = new Displayer('../images/left_pane','../images/right_pane');
// Load the main template file
$template = $displayer->prepare_base_frame();

$sphinx->update_gpt_state($_POST['next_page']);

// Replace placeholders in the main template
$subpage = file_get_contents('content.php');

// Replace placeholders in the subpage template
$subpageTitle = 'Middle-term plan';
$subpageContent = '<p>This is the content of the subpage.</p>';

// Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{ACTION SCRIPT}}', "./load_short_term_plan.php", $subpage);
$subpage = str_replace('{{SUBPAGE_TITLE}}', $subpageTitle, $subpage);
$subpage = str_replace('{{CURRENT SCRIPT}}', "./load_middle_term_plan.php", $subpage);
$subpage = str_replace('{{SUBPAGE_CONTENT}}', $sphinx->propose_plan('middle_term_plan'), $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);
$template = str_replace('{{LEFT PANE}}', $displayer->give_left_pane(), $template);
$template = str_replace('{{RIGHT PANE}}', $displayer->give_right_pane(), $template);

// Output the final HTML
echo $template;
?>
