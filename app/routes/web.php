<?php

use App\Core\Router;


use App\Controllers\HomeController;
use App\Controllers\AuthController;

// Create a new router instance
$router = new Router();


// Define routes for GET Request
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->get('/signup', [AuthController::class, 'signup']);

// Define routes for POST Request
$router->post('/login', [AuthController::class, 'handleLogin']);
$router->post('/signup', [AuthController::class, 'handleSignup']);
