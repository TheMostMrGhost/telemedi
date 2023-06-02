<?php 
declare(strict_types=1);

class Sphinx {
    private string $question_path;
    private array $questions;
    private array $answers;
    private array $plans;

    /**
     * Sphinx constructor.
     *
     * Initializes a new instance of the Sphinx class.
     *
     * @param string $question_path (optional) The path to the JSON file containing questions. Defaults to "./prompts/questions.json".
     */
    public function __construct(string $question_path = "./prompts/questions.json") {
        $this->question_path = $question_path;
        $this->plans = array();
        $this->load_json($this->question_path);
    }


    /**
     * Load JSON data from the specified file and populate the questions property.
     *
     * @throws \RuntimeException If the JSON file cannot be read or parsed.
     */
    private function load_json(): void {
        // Read the contents of the JSON file
        $jsonData = file_get_contents($this->question_path);
        // Decode the JSON data into an associative array
        $this->questions = json_decode($jsonData, true);
    }



    /**
     * Check the contents of the loaded JSON data.
     * Prints the keys and values of the top-level questions and initial_questions arrays.
     */
    public function check_json(): void {
        echo "Checking <br>";
        foreach ($this->questions as $key => $value) {
            echo $key . ': ' . $value . '<br>';
        }

        foreach ($this->questions['initial_questions'] as $key => $value) {
            echo $key . ': ' . $value . '<br>';
        }
    }


    /**
     * Display initial questions to the user and collect their answers.
     * Returns the HTML content of the questions and input fields.
     *
     * @return string The HTML content of the questions and input fields.
     */
    public function ask_initial_questions(): string {
        ob_start(); // Start output buffering

        echo "<div class='sphinx-text'>";
        echo <<<EOT
            Before we venture deeper into the realm of knowledge, I shall pose unto you a series of inquiries. These queries shall aid me in discerning the most fitting path for your scholarly pursuits. I beseech you to expound upon your responses, providing both detail and clarity. Fear not, for there exists no wrong answers within this domain, and I assure you that my hunger is not inclined to be sated by your being... at least not in the present moment.
        EOT;
        echo "</div>";

        for ($ii = 0; $ii < count($this->questions['initial_questions']['templates']); $ii++) {
            $question = $this->prompt_gpt($this->questions['initial_questions']['templates'][$ii], fallback_output: $this->questions['initial_questions']['templates'][$ii]);
            $inputName = 'answer_' . $ii;
            echo "<br>";
            echo "<label for='$inputName'><div class='sphinx-text' style='font-style: italic;'>".($ii + 1). "). $question:</div></label><br>";
            echo "<textarea class='user-text' type='text' id='$inputName' name='$inputName' placeholder='Enter your answer here'></textarea><br><br>";
        }

        $content = ob_get_clean(); // Get the buffered content and clean the buffer

        return $content; // Return the concatenated string
    }


    /**
     * Propose a plan for the specified duration (long, middle, or short term).
     * Returns the HTML content of the proposed plan.
     *
     * @param string $plan_duration The duration of the plan (long, middle, or short term).
     * @return string The HTML content of the proposed plan.
     */
    public function propose_plan(string $plan_duration): string {
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

    /**
     * Show the summary of the plan for the specified duration.
     * Returns the HTML content of the plan summary.
     *
     * @param string $plan_duration The duration of the plan (long, middle, or short term).
     * @return string The HTML content of the plan summary.
     */
    public function show_summary(string $plan_duration): string {
        return $this->plans[$plan_duration];
    }


    /**
     * Store the user's answers to the initial questions.
     * Updates the GPT state with the user's answers.
     *
     * @return void
     */
    public function store_initial_questions(): void {
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


    /**
     * Update the GPT state with the provided text.
     *
     * @param string &$text The text to update the GPT state with.
     * @return void
     */
    public function update_gpt_state(string &$text): void {
        // THIS PASSES RESPONSE TO GPT TO UPDATE ITS STATE
        // For now not implemented, since I do not have API
    }


    /**
     * Prompt the ChatGPT with the provided text and retrieve the response.
     *
     * @param string &$text The text to prompt the ChatGPT with.
     * @param string &$state_prompt The state prompt to provide to the ChatGPT (optional).
     * @param string &$fallback_output The fallback output to return if ChatGPT is not available (optional).
     * @return string The response generated by the ChatGPT or the fallback output.
     */
    private function prompt_gpt(string &$text, string &$state_prompt = null, string &$fallback_output = ""): string {
        // THIS ASKS CHATGPT, BUT FOR NOW WE ONLY SIMULATE THAT IT ANSWERS
        // THIS FUNCTION IS ONLY FOR DEMONSTRATION PURPOSES

        // With the API, this function would send a request to ChatGPT and retrieve the response.
        // However, in this demonstration, it simply returns the fallback output.

        return nl2br($fallback_output);
    }





}

?>
