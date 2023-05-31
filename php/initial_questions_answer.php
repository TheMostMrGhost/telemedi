<?php
// declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "./sphinx.php";
session_start();
// require_once "./sphinx_dialog.php";
// require "./sphinx_dialog.php";
echo isset($_SESSION['sphinx']);
$sphinx = $_SESSION['sphinx'];
// var_dump($_SESSION['sphinx'])
$sphinx->greet();
$sphinx->store_initial_questions();
echo "Based on your answers I propose this:";
?>
