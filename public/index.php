<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Config/app.php';

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

$routeKey = 0; // default route key
$routeParts = extractRoute($_ENV['BASE_URL']);
foreach ($routeParts as $key => $routeValue) {
    $routeKey = $key;
}

$uri = '/' . UriHelper::removeParams($routeParts[$routeKey]);

// Import router
require_once __DIR__ . '/../app/Routes/web.php';

$router->dispatch($uri);
