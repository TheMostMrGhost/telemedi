<!-- subpage.php -->
<section>
    <h2>{{SUBPAGE_TITLE}}</h2>
    <div class="subpage-content">
        {{SUBPAGE_CONTENT}}
    </div>
  <form action="{{ACTION SCRIPT}}" method="post">
    <input type="hidden" name="next_page" value="{{NEXT PAGE}}">
    <button type="submit">Next</button>
  </form>
  <form action="./reload.php" method="post">
    <label for="modification-message">Did you forget about something or are unsatisfied with current answer? Tell me about it!</label><br>
    <input type="hidden" name="script_to_reload" value="{{CURRENT SCRIPT}}">
    <textarea id="modification-message" name="modification-message" ></textarea><br>
    <button type="submit">Reapply</button>
  </form>
</section>

