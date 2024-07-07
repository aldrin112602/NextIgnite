<?php

use App\Core\Router;


use App\Controllers\HomeController;

// Create a new router instance
$router = new Router();


// Define routes
$router->get('/', [HomeController::class, 'index']);
