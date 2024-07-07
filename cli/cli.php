<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$config = require __DIR__ . '/../app/Config/config.php';

$commands = [
    'make:model' => \App\Cli\MakeModelCommand::class,
    'make:view' => \App\Cli\MakeViewCommand::class,
    'make:controller' => \App\Cli\MakeControllerCommand::class,
];

if ($argc < 2) {
    echo "\033[36m Usage: composer ignite <command> [options]\n";
    echo "\033[33m";
    echo "Available commands:\n";
    echo "\033[32m";
    foreach ($commands as $command => $class) {
        echo "  - $command\n";
    }
    echo "\033[0m";
    exit(1);
}

$command = $argv[1];

if (!isset($commands[$command])) {
    echo "\033[31m";
    echo "Unknown command: $command\n";
    echo "\033[0m";
    exit(1);
}

/** @var string $class */
$class = $commands[$command];
/** @var Command $instance */
$instance = new $class($config);

array_shift($argv);
array_shift($argv);

$instance->run($argv);