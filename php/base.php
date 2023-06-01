<!-- template.php -->
<!DOCTYPE html>
<html>
  <head>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>

    <div class="grid-container">
      <!-- <div class="header"> -->
      <!-- <h2>Header</h2> -->
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
      <!-- </div> -->

      <div class="left">
        <div class="column-base-top ">
          Popular options
        </div>
        <div class="card-gallery">

          <div class="card">
              <img src="../images/sphinx.png" alt="My Image" class="picture">
            <div class="description">
              {{species.name}}
            </div>
          </div>
          <div class="card">
              <img src="../images/sphinx.png" alt="My Image" class="picture">

            <div class="description">
              {{species.name}}
            </div>
          </div>
          <div class="card">
              <img src="../images/sphinx.png" alt="My Image" class="picture">

            <div class="description">
              {{species.name}}
            </div>
          </div>
        </div>
        <!-- {{LEFT PANE}} -->
        <!-- <div class="column-base-top"></div> -->
      </div>
      <div class="middle">
        {{MIDDLE PAGE}}
      </div>  



      <div class="right" >
        <div class="column-base-top ">
          Recomendations
        </div>
        <div class="card-gallery">

          <div class="card">
              <img src="../images/sphinx.png" alt="My Image" class="picture">

            <div class="description">
              {{species.name}}
            </div>
          </div>
          <div class="card">
              <img src="../images/sphinx.png" alt="My Image" class="picture">

            <div class="description">
              {{species.name}}
            </div>
          </div>
          <div class="card">
              <img src="../images/sphinx.png" alt="My Image" class="picture">

            <div class="description">
              {{species.name}}
            </div>
          </div>
          <div class="card">
              <img src="../images/sphinx.png" alt="My Image" class="picture">

            <div class="description">
              {{species.name}}
            </div>
          </div>
        </div>
        {{RIGHT PANE}}
      </div>

      <div class="footer">
        <p>{{FOOTER}}</p>
      </div>
    </div>

  </body>
</html>
