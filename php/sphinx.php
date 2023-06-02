<?php 
declare(strict_types=1);

class Sphinx {
    private static $hello = "Welcome  young seeker of wisdom!I'm Sphinx and I will guide you during your journey!";

    private string $question_path;
    private array $questions;
    private array $answers;
    private array $plans;

    public function __construct(string $question_path = "./prompts/questions.json") {
      $this->question_path = $question_path;
      $this->plans = array();
      $this->load_json($this->question_path);
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
      $thanks = "By providing your answers to these eight questions, I'll be able to gather the necessary information to create a tailored and perfect learning plan for the subject of your choice.";
      return $thanks;
    }

    public function ask_initial_questions(): string {
        ob_start(); // Start output buffering

        echo "<div class='sphinx-text'>";
        echo <<<EOT
            Before we venture deeper into the realm of knowledge, I shall pose unto you a series of inquiries. These queries shall aid me in discerning the most fitting path for your scholarly pursuits. I beseech you to expound upon your responses, providing both detail and clarity. Fear not, for there exists no wrong answers within this domain, and I assure you that my hunger is not inclined to be sated by your being... at least not in the present moment.
        EOT;
        echo "</div>";


        for ($ii = 0; $ii < count($this->questions['initial_questions']['templates']); $ii++) {
            $question = $this->prompt_gpt($this->questions['initial_questions']['templates'][$ii], 
                            fallback_output: $this->questions['initial_questions']['templates'][$ii]);
            $inputName = 'answer_' . $ii;
            echo "<br>";
            echo "<label for='$inputName'><div class='sphinx-text' style='font-style: italic;'>".($ii + 1). "). $question:</div></label><br>";
            echo "<textarea class='user-text' type='text' id='$inputName' name='$inputName' placeholder='Enter your answer here'></textarea><br><br>";

        }

        $content = ob_get_clean(); // Get the buffered content and clean the buffer

        return $content; // Return the concatenated string
    }


    public function propose_plan(string $plan_duration) : string { // long, middle, short term
      ob_start(); // Start output buffering
      $templates = implode("\n", $this->questions[$plan_duration]['templates']);
      $gpt_output = $this->prompt_gpt(
          $this->questions[$plan_duration]['tasks'],
          $templates,
          $this->questions[$plan_duration]['sample_response']
      );

      echo "<div class='sphinx-text'>";
      echo $gpt_output . "\n"; 
      echo "</div>";
      $content = ob_get_clean(); // Get the buffered content and clean the buffer
      $this->plans[$plan_duration] = $content;

      return $content; // Return the concatenated string
    }

    public function show_summary(string $plan_duration) : string {
      return $this->plans[$plan_duration];
    }


    public function store_initial_questions() : void {
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

    private function prompt_gpt(string &$text, string &$state_prompt = null, string &$fallback_output = "") : string {
      // THIS ASKS CHATGPT, BUT FOR NOW WE ONLY SIMULATE THAT IT ANSWERS
      // THIS FUNCTION IS ONLY FOR DEMONSTRATION PURPOSES, 
      // 
      // Wtih API this will send request to ChatGPT, but now it only output $text.
      return nl2br($fallback_output);
    }




}

?>
