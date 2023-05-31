
<?php
// Load the main template file
$template = file_get_contents('template.php');

// Replace placeholders in the main template
$title = 'My Page Title';
$header = 'Welcome to My Website';
$content = file_get_contents('subpage.php');

// Replace placeholders in the subpage template
$subpageTitle = 'Subpage Title';
$subpageContent = '<p>This is the content of the subpage.</p>';

// Replace placeholders in the subpage template with specific content
$subpage = str_replace('{{SUBPAGE_TITLE}}', $subpageTitle, $content);
$subpage = str_replace('{{SUBPAGE_CONTENT}}', $subpageContent, $subpage);

// Replace placeholders in the main template with the subpage content
$template = str_replace('{{TITLE}}', $title, $template);
$template = str_replace('{{HEADER}}', $header, $template);
$template = str_replace('{{MIDDLE_PAGE}}', $subpage, $template);

// Output the final HTML
echo $template;
?>
