<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "./sphinx.php";
require_once "./displayer.php";
session_start();
$sphinx = $_SESSION['sphinx'];
$sphinx->update_gpt_state($_POST['next_page']);

if (!isset($_SESSION['displayer'])) {
  $displayer = new Displayer('../images/left_pane','../images/right_pane');
  $_SESSION['displayer'] = $displayer;
} else {
  $displayer = $_SESSION['displayer'] ;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['next_page'])) {
    $sphinx->update_gpt_state($_POST['next_page']);
  }
}

// Load the main template file
$template = $displayer->prepare_base_frame();

// Replace placeholders in the main template
$subpage = file_get_contents('summary_page.php');

// Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{SUBPAGE_TITLE}}', "Plan overview", $subpage);
$subpage = str_replace('{{SUBPAGE_CONTENT}}', "", $subpage);
        
$subpage = str_replace('{{LONG TERM PLAN}}', $sphinx->show_summary('long_term_plan'), $subpage);
$subpage = str_replace('{{MIDDLE TERM PLAN}}', $sphinx->show_summary('middle_term_plan'), $subpage);
$subpage = str_replace('{{SHORT TERM PLAN}}', $sphinx->show_summary('short_term_plan'), $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{MIDDLE PAGE}}', $subpage, $template);
$template = str_replace('{{LEFT PANE}}', $displayer->give_left_pane(), $template);
$template = str_replace('{{RIGHT PANE}}', $displayer->give_right_pane(), $template);

// Output the final HTML
echo $template;
?>

