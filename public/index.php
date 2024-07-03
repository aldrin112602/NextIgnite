<?php

require '../vendor/autoload.php';

use App\Helpers\UriHelper;
use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/**
 * Extracts the route parts from the request URI based on the given base path.
 *
 * @param string $basePath The base path to remove from the request URI.
 * @return array An array of route parts extracted from the request URI.
 */
function extractRoute($basePath)
{
    if (substr($basePath, -1) !== '/') $basePath .= '/';
    $route = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
    $routeParts = array_filter(explode('/', $route));
    if (count($routeParts) == 0) $routeParts[] = '';
    return $routeParts;
}

$basePath = '/' . array_filter(explode('/', $_SERVER['REQUEST_URI']))[1] . '/';
$routeParts = extractRoute($basePath);
$uri = '/' . UriHelper::removeParams($routeParts[count($routeParts) - 1]);

// import router here
require_once '../app/routes/web.php';

$router->dispatch($uri);
