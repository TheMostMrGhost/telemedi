<?php 
declare(strict_types=1);
session_start();

class Sphinx {
    private static $hello = "Welcome  young seeker of wisdom!I'm Sphinx and I will guide you during your journey!";
    private static $question_path = "../prompts/questions.json";

    private array $questions;
    private array $answers;

    public function __construct(string $name, int $age, string $location) {
      echo "Loading <br>";
      $this->load_json(self::$question_path);
      echo "Done <br>";
    }

    public function greet(): void {
      echo self::$hello;
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
      }

      foreach ($this->questions['initial_questions'] as $key => $value) {
          echo $key . ': ' . $value . '<br>';
      }}

    public function thank_for_answering() : void {
      static $thanks = "By providing your answers to these eight questions, I'll be able to gather the necessary information to create a tailored and perfect learning plan for the subject of your choice.";
      echo $thanks;
    }

    public function ask_initial_questions() : void {
      echo <<<'EOT'
        Before we preceed with your studies, I need to ask you the following question.
      They will help me pick a learning path that is optimal for You, so try to be as verbose and precise as you can.
      There are no bad answers, so do not worry, I will not eat You. For now at least...
      EOT;

    // INITIALIZE TASK HERE TODO
    //
    // echo count($this->questions['initial_questions']['templates']);
    // echo $this->questions['initial_questions']['templates'][0];
    echo "<form action='./store_initial_questions.php' method='post'>";

    for ($ii = 0; $ii < count($this->questions['initial_questions']['templates']); $ii++) {
        $question = $this->prepare_question($this->questions['initial_questions']['templates'][$ii]);
        $inputName = 'answer_' . $ii;
        echo "<label for='$inputName'>$question:</label><br>";
        echo "<input type='text' id='$inputName' name='$inputName'><br><br>";
    }

    echo "<button type='submit'>Submit</button>";
    echo "</form>";

// TODO add "do you want to add something else?"


        }


    public function store_initial_questions() : void{
      $info_for_GPT = "User answers:\n";

      for ($ii = 0; $ii < count($this->questions['initial_questions']['templates']); $ii++) {
          $inputName = 'answer_' . $ii;
          $info_for_GPT .= $inputName . "\n";

          if (isset($_POST[$inputName])) {
            $info_for_GPT .= $this->answers['initial_questions'][$inputName] = $_POST[$inputName];
          }

          $info_for_GPT .= "\n";
      }

      $this->update_gpt_state($info_for_GPT);
    }


    public function update_gpt_state(string &$text) : void{
    // THIS PASSES RESPONSE TO GPT TO UPDATE ITS STATE
    // For now not implemented, since I do not have API
    }

    private function prepare_question(string &$text, string &$state_prompt = null) : string {
    //THIS ASKS CHATGPT, BUT FOR NOW WE ONLY SIMULATE THAT IT ANSWERS
     return $text;
    }




}

?>
