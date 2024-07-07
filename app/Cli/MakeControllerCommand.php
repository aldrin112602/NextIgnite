<?php

namespace App\Cli;

class MakeControllerCommand extends Command
{

    /**
     * This method is responsible for running the command to create a new controller.
     *
     * @param array $args The command line arguments. The first argument should be the name of the controller.
     *
     * @return void
     */
    public function run($args)
    {
        if (count($args) < 1) {
            echo "\033[36m Usage: composer ignite make:controller <ControllerName> \033[0m\n";
            exit(1);
        }

        $controllerName = $args[0];
        $controllerPath = __DIR__ . '/../Controllers/' . str_replace('.', '/', $controllerName) . '.php';
        $controllerDir = dirname($controllerPath);

        if (file_exists($controllerPath)) {
            echo "\033[31m Controller already exists: $controllerPath \033[0m\n";
            exit(1);
        }

        if (!is_dir($controllerDir)) {
            mkdir($controllerDir, 0777, true);
        }

        $viewTemplate = $this->getControllerTemplate($controllerName);

        file_put_contents($controllerPath, $viewTemplate);

        echo "\033[32m Controller created successfully at: $controllerPath  \033[0m\n";
        echo "\033[33m Quote: " . $this->getRandomQuote() . "\033[0m\n";
    }



    /**
     * This method generates a controller template with a given name.
     *
     * @param string $controllerName The name of the controller. It can include namespaces separated by dots.
     *
     * @return string The controller template as a string.
     */    protected function getControllerTemplate($controllerName)
    {
        $quote = $this->getRandomQuote();
        $splitName = explode(".", $controllerName);
        $controllerName = count($splitName) == 1 ? $controllerName : $splitName[count($splitName) - 1];
        return "<?php

namespace App\Controllers;

use App\Core\Controller;

class $controllerName extends Controller
{
    public function index()
    {
        // \$this->view('home/index');
    }
        // Add methods here
        // Quotes: \"$quote\"

}
";
    }
}
