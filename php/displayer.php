<?php 
declare(strict_types=1);
// session_start();

class Displayer {
    // A class that is responsible for displaying left and right pane

    public function __construct() {
    }

    public function give_left_pane() : string {
      
    }

    public function give_right_pane() : string {
    }

    private function create_card(string $image_path, string $text) : string {
      ob_start(); // Start output buffering

      echo "<div class='card'>";
      echo "<img src='".$image_path."' alt='My Image' class='picture'>";
      echo "<div class='description'>";
      echo $text;
      echo "</div>";
      echo "</div>";


      return ob_get_clean(); // Get the buffered content and clean the buffer
    }
}

?>
