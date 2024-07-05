<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$config = require __DIR__ . '/../app/Config/config.php';

$commands = [
    'make:model' => \App\Cli\MakeModelCommand::class,
    'make:view' => \App\Cli\MakeViewCommand::class,
];

if ($argc < 2) {
    echo "Usage: composer next <command> [options]\n";
    echo "Available commands:\n";
    foreach ($commands as $command => $class) {
        echo "  - $command\n";
    }
    exit(1);
}

$command = $argv[1];

if (!isset($commands[$command])) {
    echo "Unknown command: $command\n";
    exit(1);
}

$class = $commands[$command];
$instance = new $class($config);

array_shift($argv); // Remove the script name
array_shift($argv); // Remove the command name

$instance->run($argv);
