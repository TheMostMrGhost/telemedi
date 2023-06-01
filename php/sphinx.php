<?php 
declare(strict_types=1);
// session_start();

class Sphinx {
    private static $hello = "Welcome  young seeker of wisdom!I'm Sphinx and I will guide you during your journey!";

    private string $question_path;// = "../prompts/questions.json";
    private array $questions;
    private array $answers;
    private array $plans;

    public function __construct(string $name, int $age, string $question_path = "./prompts/questions.json") {
      $this->question_path = $question_path;
      $this->plans = array();
      $this->load_json($this->question_path);
    }

    public function greet(): string {
      return self::$hello;
      // $this->loadjj
    }

    private function load_json(string $filename): void {

      // Read the contents of the JSON file
      $jsonData = file_get_contents($this->question_path);
      // Decode the JSON data into an associative array
      $this->questions = json_decode($jsonData, true);
    }

    public function check_json() : void{
      echo "Checking <br>";
      foreach ($this->questions as $key => $value) {
          echo $key . ': ' . $value . '<br>';
      }

      foreach ($this->questions['initial_questions'] as $key => $value) {
          echo $key . ': ' . $value . '<br>';
      }
    }

    public function thank_for_answering() : string {
      static $thanks = "By providing your answers to these eight questions, I'll be able to gather the necessary information to create a tailored and perfect learning plan for the subject of your choice.";
      return $thanks;
    }

    public function ask_initial_questions(): string {
        ob_start(); // Start output buffering

        echo "<div class='sphinx-text'>";
        echo <<<EOT
            Before we proceed with your studies, I need to ask you the following questions.
            They will help me pick a learning path that is optimal for you, so try to be as verbose and precise as you can.
            There are no bad answers, so do not worry, I will not eat you. For now at least...
        EOT;
        echo "</div>";

// echo "<form action='./initial_questions_answer.php' method='post'>";
// echo "<ol>";

        for ($ii = 0; $ii < count($this->questions['initial_questions']['templates']); $ii++) {
            $question = $this->prompt_gpt($this->questions['initial_questions']['templates'][$ii]);
            $inputName = 'answer_' . $ii;
            // echo "<li>";
            echo "<label for='$inputName'><div class='sphinx-text' style='font-style: italic;'>".($ii + 1). "). $question:</div></label><br>";
            // echo "</li>";
            echo "<textarea class='user-text' type='text' id='$inputName' name='$inputName'></textarea>";

        }

        $content = ob_get_clean(); // Get the buffered content and clean the buffer

        return $content; // Return the concatenated string
    }


    public function propose_plan(string $plan_duration) : string { // long, middle, short term
      ob_start(); // Start output buffering
      $templates = implode("\n", $this->questions[$plan_duration]['templates']);
      $gpt_output = $this->prompt_gpt(
          $this->questions[$plan_duration]['tasks'],
          $templates
      );

      echo "<div class='sphinx-text'>";
      echo $gpt_output . "\n"; // TODO USE DISPLAYER
      echo "</div>";
      $content = ob_get_clean(); // Get the buffered content and clean the buffer
      $this->plans[$plan_duration] = $content;

      return $content; // Return the concatenated string
    }

    public function show_summary(string $plan_duration) : string { // long, middle, short term
      return $this->plans[$plan_duration];
    }


    public function store_initial_questions() : void {
// echo "STORED";
      $info_for_GPT = "User answers:\n";

      for ($ii = 0; $ii < count($this->questions['initial_questions']['templates']); $ii++) {
          $inputName = 'answer_' . $ii;
          $info_for_GPT .= $inputName . "\n";

          if (isset($_POST[$inputName])) {
            $info_for_GPT .= $this->answers['initial_questions'][$inputName] = $_POST[$inputName];
          }

          $info_for_GPT .= "\n";
      }

      // echo $info_for_GPT;
      $this->update_gpt_state($info_for_GPT);
    }



    public function update_gpt_state(string &$text) : void{
    // THIS PASSES RESPONSE TO GPT TO UPDATE ITS STATE
    // For now not implemented, since I do not have API
    echo $text;
    }

    private function prompt_gpt(string &$text, string &$state_prompt = null) : string {
    //THIS ASKS CHATGPT, BUT FOR NOW WE ONLY SIMULATE THAT IT ANSWERS
     return $text;
    }




}

?>
