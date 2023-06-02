<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "./sphinx.php";
require_once "./displayer.php";

session_start();
$sphinx = $_SESSION['sphinx'];

if (!isset($_SESSION['initial_stored'])) {
    // Execute the code block only for the first-time load
    $sphinx->store_initial_questions();
    // Set the variable indicating the first-time load in the session
    $_SESSION['initial_stored'] = true;
}

// Loading displayer
if (!isset($_SESSION['displayer'])) {
  $displayer = new Displayer('../images/left_pane','../images/right_pane');
  $_SESSION['displayer'] = $displayer;
} else {
  $displayer = $_SESSION['displayer'] ;
}

$template =  $displayer->prepare_base_frame();
//
// Replace placeholders in the main template
$subpage = file_get_contents('content.php');

// Replace placeholders in the subpage template
$subpageTitle = 'Long-term plan proposition';

// Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{ACTION SCRIPT}}', "./load_middle_term_plan.php", $subpage); // ACTION SCRIPT is the one executed on clicking "Next"
$subpage = str_replace('{{SUBPAGE_TITLE}}', $subpageTitle, $subpage);
$subpage = str_replace('{{CURRENT SCRIPT}}', "./load_long_term_plan.php", $subpage); 
$subpage = str_replace('{{SUBPAGE_CONTENT}}', $sphinx->propose_plan('long_term_plan'), $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);

echo $template;
?>

