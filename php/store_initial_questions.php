<?php

session_start();
require "./sphinx.php";
$_SESSION['sphinx']->processForm();
?>
