<?php

namespace App\Cli;

class MakeModelCommand
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function run($args)
    {
        if (count($args) < 1) {
            echo "\033[31m Usage: composer ignite make:model <ModelName> \033[0m\n";
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

    protected function getRandomQuote()
    {
        $quotes = [
            "The only way to do great work is to love what you do. - Steve Jobs",
            "Success is not the key to happiness. Happiness is the key to success. - Albert Schweitzer",
            "Your time is limited, so don’t waste it living someone else’s life. - Steve Jobs",
            "The best way to predict the future is to invent it. - Alan Kay",
            "Life is 10% what happens to us and 90% how we react to it. - Charles R. Swindoll",
            "The only limit to our realization of tomorrow is our doubts of today. - Franklin D. Roosevelt",
            "The purpose of our lives is to be happy. - Dalai Lama",
            "Get busy living or get busy dying. - Stephen King",
            "You have within you right now, everything you need to deal with whatever the world can throw at you. - Brian Tracy",
            "Believe you can and you're halfway there. - Theodore Roosevelt"
        ];

        return $quotes[array_rand($quotes)];
    }
}
