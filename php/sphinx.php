<?php 
declare(strict_types=1);

class Sphinx {
    private static $hello = "Welcome  young seeker of wisdom!I\'m Sphinx and I will guide you during your journey!";
    private static $question_path = "../prompts/questions.json";

    private array $questions;

    public function __construct(string $name, int $age, string $location) {
      echo "Loading <br>";
      $this->load_json(self::$question_path);
      echo "Done <br>";
    }

    public function greet(): void {
      echo Sphinx::$hello;
      // $this->loadjj
    }

    private function load_json(string $filename): void {

      // Read the contents of the JSON file
      $jsonData = file_get_contents(self::$question_path);

      // Decode the JSON data into an associative array
      $this->questions = json_decode($jsonData, true);
    }

    public function check_json() :void {
      echo "Checking <br>";
      foreach ($this->questions as $key => $value) {
          echo $key . ': ' . $value . '<br>';
      }}
    }
?>
