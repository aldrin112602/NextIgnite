<?php

use Dotenv\Dotenv;

require '../vendor/autoload.php';

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Return configuration array
return [
    'app' => [
        'env' => $_ENV['APP_ENV'] ?? null,
        'debug' => $_ENV['APP_DEBUG'] ?? null
    ],
    'database' => [
        'connection' => $_ENV['DB_CONNECTION'] ?? null,
        'host' => $_ENV['DB_HOST'] ?? null,
        'port' => $_ENV['DB_PORT'] ?? null,
        'database' => $_ENV['DB_DATABASE'] ?? null,
        'username' => $_ENV['DB_USERNAME'] ?? null,
        'password' => $_ENV['DB_PASSWORD'] ?? null
    ],
    'mail' => [
        'host' => $_ENV['MAIL_HOST'] ?? null,
        'port' => $_ENV['MAIL_PORT'] ?? null,
        'username' => $_ENV['MAIL_USERNAME'] ?? null,
        'password' => $_ENV['MAIL_PASSWORD'] ?? null,
        'encryption' => $_ENV['MAIL_ENCRYPTION'] ?? null,
        'from_address' => $_ENV['MAIL_FROM_ADDRESS'] ?? null,
        'from_name' => $_ENV['MAIL_FROM_NAME'] ?? null
    ]
];
