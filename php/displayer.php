<?php 
declare(strict_types=1);

/**
 * Class responsible for preparing elements to display.
 * Allows for easy preparation of structured content.
 */
class Displayer {
    // A class that is responsible for displaying left and right pane
    private string $left_pane_dir;
    private string $right_pane_dir;
    private string $base_layout;


    /**
     * Displayer constructor.
     *
     * @param string $left_pane_dir The directory path for the left pane.
     * @param string $right_pane_dir The directory path for the right pane.
     */
    public function __construct(string $left_pane_dir, string $right_pane_dir) {
        $this->left_pane_dir = $left_pane_dir;
        $this->right_pane_dir = $right_pane_dir;
    }



    /**
     * Get the HTML content for the left pane.
     *
     * @return string The HTML content of the left pane.
     */
    public function give_left_pane() : string {
        $result = "<div class='column-base-top'>Recommended topics</div><div class='card-gallery'>";

        // Get all file names in the directory
        $fileNames = scandir($this->left_pane_dir);

        // Remove . and .. from the array
        $fileNames = array_diff($fileNames, array('.', '..'));

        // Display the file names
        foreach ($fileNames as $fileName) {
            $result .= $this->create_card($this->left_pane_dir."/".$fileName, pathinfo($fileName, PATHINFO_FILENAME));
        }

        $result .="</div>";

        return $result;
    }


    /**
     * Get the HTML content for the right pane.
     *
     * @return string The HTML content of the right pane.
     */
    public function give_right_pane() : string {
        $result = "<div class='column-base-top'>You may also like</div><div class='card-gallery'>";

        // Get all file names in the directory
        $fileNames = scandir($this->right_pane_dir);

        // Remove . and .. from the array
        $fileNames = array_diff($fileNames, array('.', '..'));

        // Display the file names
        foreach ($fileNames as $fileName) {
            $result .= $this->create_card($this->right_pane_dir."/".$fileName, pathinfo($fileName, PATHINFO_FILENAME));
        }

        $result .="</div>";

        return $result;
    }

    /**
     * Create an HTML card element with an image and description.
     *
     * @param string $image_path The path to the image for the card.
     * @param string $text The description text for the card.
     * @return string The HTML content of the card.
     */
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


    /**
     * Create a footer element with social media icons.
     *
     * @return string The HTML content of the footer.
     */
    public function create_footer() : string {
        ob_start(); // Start output buffering

        echo "<b>Follow us:</b>";
        echo "<nav class='social-icons'>";
        echo "<a href='https://www.facebook.com/' class='icon'><i class='fab fa-facebook-f'></i></a>";
        echo "<a href='https://www.twitter.com/' class='icon'><i class='fab fa-twitter'></i></a>";
        echo "<a href='https://www.instagram.com/' class='icon'><i class='fab fa-instagram'></i></a>";
        echo "</nav>";

        return ob_get_clean(); // Get the buffered content and clean the buffer
    }

    /**
     * Prepare the base frame of the web page by replacing placeholders with generated content.
     *
     * @return string The final HTML content of the base frame.
     */
    public function prepare_base_frame() : string {
        if (isset($this->base_layout)) {
            return $this->base_layout;
        }

        require_once "./sphinx.php";
        $sphinx = $_SESSION['sphinx'];

        if (!isset($_SESSION['initial_stored'])) {
            // Execute the code block only for the first-time load
            $sphinx->store_initial_questions();
            // Set the variable indicating the first-time load in the session
            $_SESSION['initial_stored'] = true;
        }

        // Load the main template file
        $template = file_get_contents('base.php');

        // Replace placeholders with generated content
        $template = str_replace('{{LEFT PANE}}', $this->give_left_pane(), $template);
        $template = str_replace('{{RIGHT PANE}}', $this->give_right_pane(), $template);
        $template = str_replace('{{FOOTER}}', $this->create_footer(), $template);

        // Set the base layout to the final HTML content
        $this->base_layout = $template;

        return $template;
    }

}

?>
