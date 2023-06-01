<!-- template.php -->
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
          <a href="../index.php">Home</a>
          <a href="">About us</a>
        </div>

        <div class="log-in">

          <button>Sign In</button> 
          <button>Log In</button>
        </div>
      </div>

      <div class="left" style="background-color:#aaa;">{{LEFT PANE}}</div>
      <div class="middle" style="background-color:#bbb;">
        {{MIDDLE PAGE}}
      </div>  
      <div class="right" style="background-color:#ccc;">{{RIGHT PANE}}</div>

      <div class="footer">
        <p>{{FOOTER}}</p>
      </div>
    </div>

  </body>
</html>
