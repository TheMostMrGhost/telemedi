<!-- subpage.php -->
<section>
    <h2>{{SUBPAGE_TITLE}}</h2>
    <div class="subpage-content">
        {{SUBPAGE_CONTENT}}
    </div>
  <form action="{{ACTION SCRIPT}}" method="post">
    <input type="hidden" name="next_page" value="{{NEXT PAGE}}">
    <br>
    <button type="submit">Next</button>
  </form>

<div style="margin-bottom: 60px;"></div> <!-- Add spacing here -->
  <hr>
  <form action="./reload.php" method="post">
    <label for="modification-message"><h3>Unsatisfied with the response? Tell me what was wrong.</h3></label><br>
    <input type="hidden" name="script_to_reload" value="{{CURRENT SCRIPT}}">
    <textarea class="user-text" id="modification-message" name="modification-message" placeholder='Enter your answer here'></textarea><br>
    <button type="submit">Generate new response</button>
  </form>
</section>

