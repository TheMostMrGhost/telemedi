Hi, glad to see you!
I'm Sphinx, your private guide to knowledge and wisdom. 
Before we preceed, tell me about yourself
<!-- <form action="php/sphinx_dialog.php" method="post"> -->
<form action="php/load_initial_questions.php" method="post">
  <label for="about-yourself">Tell me about yourself:</label><br>
  <textarea id="about-yourself" name="about-yourself" placeholder="Write anything you want to tell me..."></textarea><br>


  <label for="field-knowledge">What would you like to learn about?</label><br>
  <textarea id="field-knowledge" name="field-knowledge" placeholder="What interests you?"></textarea><br>
  <!-- <button type="submit">Submit</button> -->
<input type="submit" name="Submit" value="Submit">
</form>
<!-- Don't worry, regardless of the answer, I won't eat you! At least for now... -->
