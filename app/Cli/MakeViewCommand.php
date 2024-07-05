<?php

namespace App\Cli;

class MakeViewCommand
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function run($args)
    {
        if (count($args) < 1) {
            echo "\033[31m Usage: composer next make:view <ViewName> \033[0m\n";
            exit(1);
        }

        $viewName = $args[0];
        $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $viewName) . '.php';
        $viewDir = dirname($viewPath);

        if (file_exists($viewPath)) {
            echo "\033[31m View already exists: $viewPath \033[0m\n";
            exit(1);
        }

        if (!is_dir($viewDir)) {
            mkdir($viewDir, 0777, true);
        }

        $viewTemplate = $this->getViewTemplate($viewName);

        file_put_contents($viewPath, $viewTemplate);

        echo "\033[32m View created successfully at: $viewPath  \033[0m\n";
        echo "\033[33m Quote: " . $this->getRandomQuote() . "\033[0m\n";
    }

    protected function getViewTemplate($viewName)
    {
        $quote = $this->getRandomQuote();
        return "
<h1>View file created</h1>
<p>{$quote}</p>
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
