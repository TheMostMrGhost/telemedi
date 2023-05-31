
<?php
header('Content-Disposition: inline');
session_start();
require "./sphinx.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

    <!-- <h2>CSS Template using Grid</h2> -->
    <!-- <p>In this example, we have created a header, three equal columns and a footer. On smaller screens, the columns will stack on top of each other.</p> -->
    <!-- <p>Resize the browser window to see the responsive effect.</p> -->
    <!-- <p><strong>Note:</strong> The Grid Layout Module is not supported in Internet Explorer or Edge 15 eand earlier versions.</p> -->

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
        Hi, glad to see you!
        I'm Sphinx, your private guide to knowledge and wisdom. 
        Before we preceed, tell me about yourself

        <?php
        $sphinx = new Sphinx('John', 25, 'London');
        $sphinx->greet();
        $sphinx->check_json();
?>
        <!-- Don't worry, regardless of the answer, I won't eat you! At least for now... -->
      </div>  
      <div class="right" style="background-color:#ccc;">Column</div>

      <div class="footer">
        <p>Footer</p>
      </div>
    </div>

  </body>
</html>
