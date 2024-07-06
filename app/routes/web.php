<?php

use App\Core\Router;

use App\Controllers\AuthController;
use App\Controllers\HomeController;

// Create a new router instance
$router = new Router();


// Define routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/sendMail', [HomeController::class, 'sendEmail']);
$router->get('/login', [AuthController::class, 'login']);
