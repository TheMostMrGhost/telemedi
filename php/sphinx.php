<?php 
declare(strict_types=1);
// session_start();

class Sphinx {
    private static $hello = "Welcome  young seeker of wisdom!I'm Sphinx and I will guide you during your journey!";
    private static $question_path = "../prompts/questions.json";

    private array $questions;
    private array $answers;

    public function __construct(string $name, int $age, string $location) {
      echo "Loading <br>"; // FIXME
      $this->load_json(self::$question_path);
      echo "Done <br>";
    }

    public function greet(): void {
      echo "hello";
      // echo self::$hello;
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
      echo "<form action='./initial_questions_answer.php' method='post'>";

      for ($ii = 0; $ii < count($this->questions['initial_questions']['templates']); $ii++) {
          $question = $this->prompt_gpt($this->questions['initial_questions']['templates'][$ii]);
          $inputName = 'answer_' . $ii;
          echo "<label for='$inputName'>$question:</label><br>";
          echo "<input type='text' id='$inputName' name='$inputName'><br><br>";
      }

      echo "<button type='submit'>Submit</button>";
      echo "</form>";


    }

    public function propose_plan(string $plan_duration) : void{ // long, middle, short term
      // TODO change to enum
      // $gpt_output = $this->prompt_gpt(
      //     $this->questions[$plan_duration]['tasks'],
      //     implode("\n",$this->questions[$plan_duration]['templates']) // Concat into one, context-like variable
      //   );
$templates = implode("\n", $this->questions[$plan_duration]['templates']);
$gpt_output = $this->prompt_gpt(
    $this->questions[$plan_duration]['tasks'],
    $templates
);
      echo $gpt_output . "\n"; // TODO USE DISPLAYER

      switch ($plan_duration) {
          case 'long_term_plan':
              // Code to be executed if $option is 'long'
              echo "Option is long.";
              break;

          case 'middle_term_plan':
              // Code to be executed if $option is 'middle'
              echo "Option is middle.";
              break;

          case 'short_term_plan':
              // Code to be executed if $option is 'short'
              echo "Option is short.";
              break;

          default:
              // Code to be executed if $option doesn't match any of the cases
              echo "Invalid option.";
              break;
      }
    }


    public function store_initial_questions() : void{
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
    }

    private function prompt_gpt(string &$text, string &$state_prompt = null) : string {
    //THIS ASKS CHATGPT, BUT FOR NOW WE ONLY SIMULATE THAT IT ANSWERS
     return $text;
    }




}

?>
