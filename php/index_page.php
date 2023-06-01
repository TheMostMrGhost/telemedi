<div class="sphinx-text">
Hi, glad to see you!
I'm Sphinx, your private guide to knowledge and wisdom. 
Before we preceed, tell me about yourself
</div>
<!-- <form action="php/sphinx_dialog.php" method="post"> -->
<form action="load_initial_questions.php" method="post">

<!-- <div class="user-text"> -->
  <label for="about-yourself"><h3>Tell me about yourself:</h3></label><br>
  <textarea class="user-text" id="about-yourself" name="about-yourself" placeholder="Enter your answer here"></textarea><br>
<!-- </div> -->

  <label for="field-knowledge"><h3>What would you like to learn about?</h3></label><br>
  <textarea class="user-text" id="field-knowledge" name="field-knowledge" placeholder="Enter your answer here"></textarea><br>

<input type="submit" name="Submit" value="Submit">
</form>
<!-- Don't worry, regardless of the answer, I won't eat you! At least for now... -->
