<?php
session_start();

// Get the value of $_SESSION['next_page'] or another global variable
$templateName = $_SESSION['next_page']; // Replace 'next_page' with your specific variable

// Switch-case statement to load the correct template based on the value
switch ($templateName) {
    case 'template1':
        include 'template1.php';
        break;
    case 'template2':
        include 'template2.php';
        break;
    case 'template3':
        include 'template3.php';
        break;
    default:
        include 'default_template.php';
        break;
}
?>
