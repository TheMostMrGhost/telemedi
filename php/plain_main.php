

<!-- subpage.php -->
<section>
    <h2>{{SUBPAGE_TITLE}}</h2>
        {{SUBPAGE_CONTENT}}
  <form action="{{ACTION SCRIPT}}" method="post">
    <input type="hidden" name="next_page" value="{{NEXT PAGE}}">
    {{FORM CONTENT}}
    <button type="submit">Submit</button>
  </form>
</section>

