<?php

namespace App\Cli;

class MakeModelCommand extends Command
{

    /**
     * Runs the command to create a new model.
     *
     * @param array $args Command line arguments. The first argument should be the model name.
     * @return void
     */
    public function run($args)
    {
        if (count($args) < 1) {
            echo "\033[36m Usage: composer ignite make:model <ModelName> \033[0m\n";
            exit(1);
        }

        $modelName = $args[0];
        $modelPath = __DIR__ . '/../Models/' . $modelName . '.php';

        if (file_exists($modelPath)) {
            echo "\033[31m Model already exists: $modelPath \033[0m\n";
            exit(1);
        }

        $modelTemplate = $this->getModelTemplate($modelName);

        file_put_contents($modelPath, $modelTemplate);

        echo "\033[32m Model created successfully at: $modelPath  \033[0m\n";
        echo "\033[33m Quote: " . $this->getRandomQuote() . "\033[0m\n";
    }


    /**
     * Returns the model template with the given model name.
     *
     * @param string $modelName The name of the model to be created.
     * @return string The model template with the given model name.
     */
    protected function getModelTemplate($modelName)
    {
        return "<?php

namespace App\Models;

class $modelName
{
    // Define your model properties and methods here
}
";
    }
}
