<!-- template.php -->
<!DOCTYPE html>
<html>
  <head>
    <!-- Link to icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>

    <!-- Grid layout, general template looks like this: -->
    <!-- | -----------------------------------------------------------------| -->
    <!-- | logo      | navigation pane           | log in / sign in buttons | -->
    <!-- | -----------------------------------------------------------------| -->
    <!-- | left pane | middle pane (for content) |      right pane          | -->
    <!-- | -----------------------------------------------------------------| -->
    <!-- |                             footer                               | -->
    <!-- | -----------------------------------------------------------------| -->
    <!---->
    <!-- Content is updated interactively, other elements are generated and stored, to make execution quicker -->
    <!-- Page layout is developed using grid, while individual containers use flex display. -->
    <!-- This file serves as a template, fields such as {{MIDDLE_PAGE}} are replaced while loading content. -->
    


    <div class="grid-container">
      <div class="logo">
        <h2>
          SPHINX 
        </h2> 
        <img src="../images/sphinx.png" alt="Logo" width="60" height="auto">


      </div>
      <div class="navig">
        <a href="../index.php">Home</a>
        <a href="">About us</a>
      </div>

      <div class="log-in">

        <button>Sign In</button> 
        <button>Log In</button>
      </div>

      <div class="left">
        {{LEFT PANE}}
      </div>
      <div class="middle">
        {{MIDDLE PAGE}}
      </div>  

      <div class="right" >
        {{RIGHT PANE}}
      </div>

      <div class="footer">
        {{FOOTER}}
      </div>
    </div>

  </body>
</html>
