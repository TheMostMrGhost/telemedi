<?php

session_start();
require_once "./sphinx.php";
echo isset($_SESSION['sphinx']);
$_SESSION['sphinx']->store_initial_questions();
header("Location: ../index.html");
exit;
?>
