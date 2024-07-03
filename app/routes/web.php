<?php

use App\Core\Router;

use App\Controllers\AuthController;
use App\Controllers\HomeController;

// Create a new router instance
$router = new Router();


// Define routes
$router->add('/', HomeController::class); // Home route
$router->add('/login', AuthController::class); // Login route
