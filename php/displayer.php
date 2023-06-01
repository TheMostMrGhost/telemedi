<?php 
declare(strict_types=1);

class Displayer {
    // A class that is responsible for displaying left and right pane
    private string $left_pane_dir;
    private string $right_pane_dir;

    public function __construct(string $left_pane_dir, string $right_pane_dir) {
      $this->left_pane_dir = $left_pane_dir;
      $this->right_pane_dir = $right_pane_dir;
    }

    public function give_left_pane() : string {
      $result = "<div class='column-base-top'>Recomended topics</div><div class='card-gallery'>";

      // Get all file names in the directory
      $fileNames = scandir($this->left_pane_dir);

      // Remove . and .. from the array
      $fileNames = array_diff($fileNames, array('.', '..'));

      // Display the file names
      foreach ($fileNames as $fileName) {
       $result .=  $this->create_card($this->left_pane_dir."/".$fileName, pathinfo($fileName, PATHINFO_FILENAME));
      }
      $result .="</div>";

       return $result;
    }

    public function give_right_pane() : string {
      $result = "<div class='column-base-top'>You may also like</div><div class='card-gallery'>";

      // Get all file names in the directory
      $fileNames = scandir($this->right_pane_dir);

      // Remove . and .. from the array
      $fileNames = array_diff($fileNames, array('.', '..'));

      // Display the file names
      foreach ($fileNames as $fileName) {
       $result .=  $this->create_card($this->right_pane_dir."/".$fileName, pathinfo($fileName, PATHINFO_FILENAME));
      }
      $result .="</div>";

       return $result;
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

    public function create_footer() :string{
      ob_start();
      echo "<b>Follow us:</b>";
      echo "<nav class='social-icons'>";
      echo "<a href='https://www.facebook.com/' class='icon'><i class='fab fa-facebook-f'></i></a>";
      echo "<a href='https://www.twitter.com/' class='icon'><i class='fab fa-twitter'></i></a>";
      echo "<a href='https://www.instagram.com/' class='icon'><i class='fab fa-instagram'></i></a>";
      echo "</nav>";
      return ob_get_clean(); // Get the buffered content and clean the buffer
  }
}

?>
