<?php

require '../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;

// Create a new router instance
$router = new Router();

// Define routes
$router->add('/', HomeController::class); // Home route
$router->add('/login', AuthController::class); // Login route

// Get the current URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Adjust URI for base path
$basePath = '/oop_based/public';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Dispatch the request to the appropriate controller
$router->dispatch($uri);
