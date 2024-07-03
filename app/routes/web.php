<?php

use App\Core\Router;

use App\Controllers\AuthController;
use App\Controllers\HomeController;

// Create a new router instance
$router = new Router();


// Define routes
$router->route('/', [HomeController::class, 'index']);
$router->route('/sendMail', [HomeController::class, 'sendEmail']);
$router->route('/login', [AuthController::class, 'login']);
