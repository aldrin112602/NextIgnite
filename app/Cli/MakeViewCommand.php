<?php

namespace App\Cli;

class MakeViewCommand extends Command
{

    /**
     * This method is responsible for running the command to create a new view file.
     *
     * @param array $args An array of command-line arguments. The first argument should be the view name.
     *
     * @return void
     */
    public function run($args)
    {
        if (count($args) < 1) {
            echo "\033[36m Usage: composer ignite make:view <ViewName> \033[0m\n";
            exit(1);
        }

        $viewName = $args[0];
        $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $viewName) . '.nxt.php';
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

    /**
     * This method returns the view template with a random quote.
     *
     * @param string $viewName The name of the view file.
     *
     * @return string The view template with a random quote.
     */
    protected function getViewTemplate($viewName)
    {
        $quote = $this->getRandomQuote();
        return "
<h1>View file created</h1>
<p>{$quote}</p>
";
    }
}
