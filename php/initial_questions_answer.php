<?php
// declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "./sphinx.php";
session_start();
$sphinx = $_SESSION['sphinx'];
$sphinx->store_initial_questions();
?>




<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>


    <div class="grid-container">
      <div class="header">
        <!-- <h2>Header</h2> -->
        <div class="logo">LOGO</div>
        <div class="navig">
          <a href="">Home</a>
          <a href="">About us</a>
        </div>

        <div class="log-in">

          <button>Sign In</button> 
          <button>Log In</button>
        </div>
      </div>

      <div class="left" style="background-color:#aaa;">Column</div>
      <div class="middle" style="background-color:#bbb;">
      <?php 
      echo "Based on your answers I propose this:";
      $sphinx->propose_plan("long_term_plan");
      ?>

<!-- $sphinx->thank_for_answering(); -->
        <!-- Don't worry, regardless of the answer, I won't eat you! At least for now... -->
      </div>  
      <div class="right" style="background-color:#ccc;">Column</div>

      <div class="footer">
        <p>Footer</p>
      </div>
    </div>

  </body>
</html>
