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
        {{MIDDLE_PAGE}}
      </div>  
      <div class="right" style="background-color:#ccc;">Column</div>

      <div class="footer">
        <p>Footer</p>
      </div>
    </div>

  </body>
</html>
