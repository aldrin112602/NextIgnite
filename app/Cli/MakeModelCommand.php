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
            echo "Usage: composer next make:model <ModelName>\n";
            exit(1);
        }

        $modelName = $args[0];
        $modelPath = __DIR__ . '/../Models/' . $modelName . '.php';

        if (file_exists($modelPath)) {
            echo "Model already exists: $modelPath\n";
            exit(1);
        }

        $modelTemplate = $this->getModelTemplate($modelName);

        file_put_contents($modelPath, $modelTemplate);

        echo "Model created: $modelPath\n";
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
}
