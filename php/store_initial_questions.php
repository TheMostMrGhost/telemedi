<?php

session_start();
require "./sphinx.php";
// $_SESSION['sphinx']->store_initial_questions();
header("Location: ../index.html");
exit;
?>
